<?php
    require_once "db.php";
    require __DIR__.'/vendor/autoload.php';
    use HeadlessChromium\BrowserFactory;
    
    $browserFactory = new BrowserFactory();
    $browser = $browserFactory->createBrowser();

    try {
        // Get menu ids
        $sql = "SELECT * FROM `menu` ORDER BY `order`";
        $result = $conn->query($sql);
        $menu_id =[];
        while ($row = $result->fetch_assoc()) {
            $menu_id[] = $row['id'];
        }
        
        for ($i=0; $i < count($menu_id) ; $i++) { 
            
        }

        $page = $browser->createPage();
        $page->navigate('https://qiymeti.net/qiymetleri/telefon/')->waitForNavigation();

        $dom = new DOMDocument();
        @$dom->loadHTML($page->getHtml(10000));
        
        $finder = new DOMXPath($dom);
        $makes = $finder->query('//li[contains(@class,"filter brands")]/div[contains(@class, "filter-content")]/div/label/a');
        
        $sql = "INSERT IGNORE INTO `make` (`name`) VALUES ";
        for ($i=0; $i < count($makes); $i++) {
            $sql .= "('".addslashes($makes[$i]->nodeValue)."') ";
            $sql .= ($i == count($makes) - 1) ?  "" : ",";
        }
        echo $sql;
        $result = $conn->query($sql);

    } catch (Exception $e) {
        echo $e;
        echo "Error";
    } finally {
        $browser->close();
    }
?>