<?php
    require_once "db.php";
    require_once "function.php";
    require __DIR__.'/vendor/autoload.php';
    use HeadlessChromium\BrowserFactory;
    
    $browserFactory = new BrowserFactory();
    $browser = $browserFactory->createBrowser();
    $page = $browser->createPage();
    $dom = new DOMDocument();

    try {
        // Get menu ids
        $sql = "SELECT * FROM `menu` ORDER BY `order`";
        $result = $conn->query($sql);
        $menu_id =[];
        while ($row = $result->fetch_assoc()) {
            $menu_id[] = $row['id'];
        }

        // Get target menu links
        $links = scrapeContent($dom, $page, 'https://qiymeti.net', '//nav[contains(@class,"menu")]/ul/li/a');
        $menu_link = [];
        for ($i=0; $i < count($links); $i++) { 
            $menu_link[] = $links[$i]->attributes->getNamedItem('href')->nodeValue;
        }

        for ($i=0; $i < count($menu_id) ; $i++) { 

            // Get Makes
            $makes = scrapeContent($dom, $page, $menu_link[$i], '//li[contains(@class,"filter brands")]/div[contains(@class, "filter-content")]/div/label/a');
            $sql = "INSERT IGNORE INTO `make` (`name`, `menu`) VALUES ";
            for ($j=0; $j < count($makes); $j++) {
                if ($makes[$j]->nodeValue == "iPhone" || $makes[$j]->nodeValue == "iPad") $makes[$j]->nodeValue = "Apple";
                $sql .= "('".addslashes($makes[$j]->nodeValue)."',".$menu_id[$i].") ";
                $sql .= ($j == count($makes) - 1) ?  "" : ",";
            }
            $conn->query($sql);


            // Get Items Info
            $item_pages = 5;
            for ($j=0; $j < $item_pages; $j++) {
                
                $items_link = $menu_link[$i] . "page/".($j + 1);
                
                $items = scrapeContent($dom, $page, $items_link, '//div[@class="products"]');
                echo $items_link;

                $items = $items[0]->childNodes;

                for ($k=0; $k < count($items) - 1; $k++) { 
                    echo "<br>";
                    $link = $items[$k]->childNodes[0]->childNodes[0]->attributes->getNamedItem('href')->nodeValue;
                    echo $link;
                    $item_price = scrapeContent($dom, $page, "", "" );
                    echo "<br>";
                    echo $items[$k]->childNodes[0]->childNodes[0]->childNodes[0]->attributes->getNamedItem('src')->nodeValue;
                    echo "<br>";
                    echo $items[$k]->childNodes[1]->childNodes[0]->nodeValue;
                    echo "<br>";
                    if ($items[$k]->childNodes[2]->attributes->getNamedItem('class')->nodeValue == 'min-price') {
                        echo intval(str_replace(' ', '', $items[$k]->childNodes[2]->childNodes[0]->nodeValue));
                    }
                    echo "<br>";
                    echo "<br>";
                    echo "<br>";
                }
            }
        }



    } catch (Exception $e) {
        echo "<br>";
        echo "Error";
        echo "<br>";
        echo $e;
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
?>