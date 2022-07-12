<?php
    require_once "db.php";
    require_once "function.php";
    require __DIR__.'/vendor/autoload.php';
    use HeadlessChromium\BrowserFactory;

    $item_pages = 5;
    
    $browserFactory = new BrowserFactory();
    $browser = $browserFactory->createBrowser();
    $page = $browser->createPage();
    $dom = new DOMDocument();

    try {
        // Get menu ids
        $menu_id = getMenuId($conn);
        // Get target menu links
        $menu_link = getMenuLink($dom, $page);

        for ($i=0; $i < count($menu_id) ; $i++) { 

            // Get and Add all Makes
            // $make = scrapeContent($dom, $page, $menu_link[$i], '//li[contains(@class,"filter brands")]/div[contains(@class, "filter-content")]/div/label/a');
            // $sql = "INSERT IGNORE INTO `make` (`name`, `menu`) VALUES ";
            // for ($j=0; $j < count($make); $j++) {
            //     if ($make[$j]->nodeValue == "iPhone" || $make[$j]->nodeValue == "iPad") $make[$j]->nodeValue = "Apple";
            //     $sql .= "('".addslashes($make[$j]->nodeValue)."',".$menu_id[$i].") ";
            //     $sql .= ($j == count($make) - 1) ?  "" : ",";
            // }
            // $conn->query($sql);
            addMake($dom, $page, $conn, $menu_link, $menu_id, $i);


            $item_data = [];
            // Get Items Info
            for ($j=0; $j < $item_pages; $j++) {
                
                $item_page_link = $menu_link[$i] . "page/".($j + 1);
                
                $item = scrapeContent($dom, $page, $item_page_link, '//div[@class="products"]');
                echo $item_page_link;
                $item = $item[0]->childNodes;

                for ($k=0; $k < count($item) - 1; $k++) {
                    $row = [];
                    echo "<br>";
                    $row['link'] = $item[$k]->childNodes[0]->childNodes[0]->attributes->getNamedItem('href')->nodeValue;
                    $item_link = $item[$k]->childNodes[0]->childNodes[0]->attributes->getNamedItem('href')->nodeValue;
                    // echo $item_link;
                    $item_price_page = scrapeContent($dom, $page, $item_link, '//div[@class="prices-wrapper"]');
                    $item_price_page = $item_price_page[0]->childNodes;
                    
                    // description
                    $item_desc = $item_price_page[1]->nodeValue;

                    $price_list = $item_price_page[6]->childNodes;
                    for ($p=1; $p < count($price_list); $p++) { 
                        $shop_price = $price_list[$p]->attributes->getNamedItem('data_price')->nodeValue;
                        $shop_price_link = $price_list[$p]->attributes->getNamedItem('href')->nodeValue;
                        $shop_price_title = $price_list[$p]->attributes->getNamedItem('title')->nodeValue;

                        loadImage($price_list[$p]->firstChild->firstChild->attributes->getNamedItem('src')->nodeValue);
                    }
                    
                    
                    
                    echo "<br>";
                    $item_image = $item[$k]->childNodes[0]->childNodes[0]->childNodes[0]->attributes->getNamedItem('src')->nodeValue;
                    echo $item_image;

                    echo "<br>";
                    $item_name = $item[$k]->childNodes[1]->childNodes[0]->nodeValue;
                    echo $item_name;

                    echo "<br>";
                    if ($item[$k]->childNodes[2]->attributes->getNamedItem('class')->nodeValue == 'min-price') {
                        echo intval(str_replace(' ', '', $item[$k]->childNodes[2]->childNodes[0]->nodeValue));
                    }
                    echo "<br>";
                    echo "<br>";
                    echo "<br>";
                }
            }
        }



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
        file_put_contents($path.basename(strtok($url, "?")), file_get_contents($url));
    }

?>