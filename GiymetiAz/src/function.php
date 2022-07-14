<?php
function getParams() {
    foreach($_REQUEST as $key => $value) {
        $GLOBALS[$key] = checkParams($value);
    }
}

function checkParams($value) {
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
}

function scrapeContent($dom, $page, $url, $query) {
    $page->navigate($url)->waitForNavigation();
    
    @$dom->loadHTML($page->getHtml(30000));
    $finder = new DOMXPath($dom);
    return $finder->query($query);
}

function getMenuId($conn) {
    $sql = "SELECT * FROM `menu` ORDER BY `order`";
    $result = $conn->query($sql);
    $menu_id =[];
    while ($row = $result->fetch_assoc()) {
        $menu_id[] = $row['id'];
    }
    return $menu_id;
}

function getMenuLink($dom, $page) {
    $link = scrapeContent($dom, $page, 'https://qiymeti.net', '//nav[contains(@class,"menu")]/ul/li/a');
    $menu_link = [];
    for ($i=0; $i < count($link); $i++) { 
        $menu_link[] = $link[$i]->attributes->getNamedItem('href')->nodeValue;
    }
    return $menu_link;
}

function addMake($dom, $page, $conn, $menu_link, $menu_id, $index) {
    $make = scrapeContent($dom, $page, $menu_link[$index], '//li[contains(@class,"filter brands")]/div[contains(@class, "filter-content")]/div/label/a');
    $sql = "INSERT IGNORE INTO `make` (`name`, `menu`) VALUES ";
    for ($j=0; $j < count($make); $j++) {
        if ($make[$j]->nodeValue == "iPhone" || $make[$j]->nodeValue == "iPad") $make[$j]->nodeValue = "Apple";
        $sql .= "('".addslashes($make[$j]->nodeValue)."',".$menu_id[$index].") ";
        $sql .= ($j == count($make) - 1) ?  "" : ",";
    }
    $conn->query($sql);
}

function loadImage($url) {
    $path = "assets/";
    $img = basename(strtok($url, "?"));
    if (!file_exists($path.$img)) {
        file_put_contents($path.$img, file_get_contents($url));
    }
    return $img;
}

function getItemsInfo($conn, $dom, $page, $menu_link, $item_pages, $index) {

    for ($j=0; $j < $item_pages; $j++) {
                
        $item_page_link = $menu_link[$index] . "page/".($j + 1);
        
        $item = scrapeContent($dom, $page, $item_page_link, '//div[@class="products"]');

        $item = $item[0]->childNodes;

        for ($k=0; $k < count($item) - 1; $k++) {
            $row = [];


            $row['name'] = $item[$k]->childNodes[1]->childNodes[0]->nodeValue;
            
            $row['link'] = $item[$k]->childNodes[1]->childNodes[0]->attributes->getNamedItem('href')->nodeValue;

            $row['make'] = strtok($row['name'], " ");

            if ($item[$k]->childNodes[2]->attributes->getNamedItem('class')->nodeValue == 'min-price') {
                $row['min-price'] = intval(str_replace(' ', '', $item[$k]->childNodes[2]->childNodes[0]->nodeValue));
            }

            $info = scrapeContent($dom, $page, $row['link'], '//*[@class="content"]');
            $row['img'] = loadImage($info[0]->childNodes[1]->childNodes[1]->attributes->getNamedItem('src')->nodeValue);

            $row['desc'] = $info[0]->childNodes[3]->childNodes[3]->nodeValue;;

            $row['price_list'] = [];
            $price_row = scrapeContent($dom, $page, $row['link'], '//a[contains(@class, "price-row")]');
            for ($h=0; $h < count($price_row); $h++) { 
        
                $shop_row = [];
                $shop_row['shop_link'] = $price_row[$h]->attributes->getNamedItem('href')->nodeValue;
        
                $shop_row['shop_price'] = intval($price_row[$h]->attributes->getNamedItem('data-price')->nodeValue);
        
                $shop_row['shop_name'] = $price_row[$h]->attributes->getNamedItem('data-company')->nodeValue;
        
                $shop_row['shop_logo'] = loadImage("https://qiymeti.net/wp-content/themes/qiymeti-theme/images/companies/".$shop_row['shop_name'].".png");
        
                $shop_row['shop_title'] = $price_row[$h]->childNodes[1]->childNodes[0]->childNodes[0]->nodeValue;
                $row['price_list'][] = $shop_row;
            }

            injectItemData($conn, $row, $index);
        }
    }    
}

function injectItemData($conn, $item_data, $index) {
    $sql = "SELECT `id` FROM `make` WHERE `name`='".$item_data['make']."' AND `menu`=".($index + 1)." LIMIT 1";
    $result = $conn->query($sql);
    $make_id = $result->fetch_assoc()['id'];
    
    $sql = "INSERT IGNORE INTO `item` (`name`, `image`, `best_price`, `make`, `desc`) VALUES ('".$item_data['name']."', '".$item_data['img']."', '".$item_data['min-price']."', '".$make_id."', '".$item_data['desc']."');";
    $conn->query($sql);
    
    for ($i=0; $i < count($item_data['price_list']); $i++) {
        $sql = "INSERT IGNORE INTO `shop` (`name`, `logo`) VALUES ('".$item_data['price_list'][$i]['shop_name']."', '".$item_data['price_list'][$i]['shop_logo']."')";
        $conn->query($sql);
        
        $sql = "SELECT `id` FROM `item` WHERE `name`='".$item_data['name']."' LIMIT 1";
        $result = $conn->query($sql);
        $item_id = $result->fetch_assoc()['id'];
        
        $sql = "SELECT `id` FROM `shop` WHERE `name`='".$item_data['price_list'][$i]['shop_name']."' LIMIT 1";
        $result = $conn->query($sql);
        $shop_id = $result->fetch_assoc()['id'];
        
        
        $sql = "SELECT * FROM `item_price` WHERE `item`=".$item_id." AND `shop`=".$shop_id." AND `title`='".$item_data['price_list'][$i]['shop_title']."' LIMIT 1";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if ($row) {
            if($row['price'] != $item_data['price_list'][$i]['shop_price']) {
                $sql = "UPDATE `item_price` SET `price`=".$item_data['price_list'][$i]['shop_price']." WHERE `item`=".$item_id." AND `shop`=".$shop_id." AND `title`='".$item_data['price_list'][$i]['shop_title']."';";
                $result = $conn->query($sql);
            }
        } else {
            
            $sql = "INSERT INTO `item_price` (`price`, `shop`, `item`, `link`, `title`) VALUES (".$item_data['price_list'][$i]['shop_price'].", ".$shop_id.", ".$item_id.", '".$item_data['price_list'][$i]['shop_link']."', '".$item_data['price_list'][$i]['shop_title']."')";
            $result = $conn->query($sql);
        }
    }
}


?>

