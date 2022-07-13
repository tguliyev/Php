<?php
    require_once "db.php";
    require_once "function.php";
    require __DIR__.'/vendor/autoload.php';
    use HeadlessChromium\BrowserFactory;

    $item_pages = 1;
    
    $browserFactory = new BrowserFactory();
    $browser = $browserFactory->createBrowser();
    $page = $browser->createPage();
    $dom = new DOMDocument();

    try {
        // Get menu ids
        $menu_id = getMenuId($conn);
        // Get target menu links
        $menu_link = getMenuLink($dom, $page);

        $item_data = [];
        // for ($i=0; $i < count($menu_id) ; $i++) { 
        for ($i=0; $i < 1 ; $i++) {

            // Add all Makes
            // addMake($dom, $page, $conn, $menu_link, $menu_id, $i);


            // Get Items Info
            for ($j=0; $j < $item_pages; $j++) {
                
                $item_page_link = $menu_link[$i] . "page/".($j + 1);
                
                $item = scrapeContent($dom, $page, $item_page_link, '//div[@class="products"]');

                // echo $item_page_link;
                $item = $item[0]->childNodes;

                for ($k=0; $k < count($item) - 1; $k++) {
                    $row = [];

                    $row['link'] = $item[$k]->childNodes[0]->childNodes[0]->attributes->getNamedItem('href')->nodeValue;

                    $row['name'] = $item[$k]->childNodes[1]->childNodes[0]->nodeValue;

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


                    $item_data[] = $row;
                }

            }
        }

        insertItems($item_data);


    } catch (Exception $e) {
        echo "<br>";
        echo $e;
        echo "<br>";
    } finally {
        $browser->close();
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

    function insertItems($item_data) {
        
    }

?>