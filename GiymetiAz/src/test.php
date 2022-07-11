<?php
    require_once "db.php";
    require __DIR__.'/vendor/autoload.php';
    use HeadlessChromium\BrowserFactory;
    
    $browserFactory = new BrowserFactory();
    $browser = $browserFactory->createBrowser();

    try {
        $page = $browser->createPage();
        $page->navigate('https://qiymeti.net/qiymetleri/telefon/')->waitForNavigation();
        

        
        // for ($i=0; $i < 10; $i++) { 
        //     $page->evaluate('document.getElementsByClassName("styles_loadMore__9YIfJ styles_paletteLoadMore__4CXTH")[0].click()')->getReturnValue();
        //     sleep(5);
        // }
        // echo $page->getHtml();

        $dom = new DOMDocument();
        @$dom->loadHTML($page->getHtml());
        
        $finder = new DOMXPath($dom);
        $names = $finder->query('//div[contains(@class,"name")]/a');
        $prices = $finder->query('//div[contains(@class,"min-price")]/span');
        $images = $finder->query('//img[contains(@class,"wp-post-image")]');
        $item_links = $finder->query('//div[contains(@class, "thumbnail")]');

        for ($i=0; $i < count($names); $i++) {
            echo $names[$i]->nodeValue;
            echo '<br>';
            echo $prices[$i]->nodeValue;
            echo '<br>';
            echo $images[$i]->attributes->getNamedItem('src')->nodeValue;
            echo '<br>';
            echo $item_links[$i]->childNodes[0]->attributes->getNamedItem('href')->nodeValue;
            echo '<br>';
            echo '<br>';
            echo '<br>';
        }

    } catch (Exception $e) {
        echo $e;
        echo "Error";
    } finally {
        $browser->close();
    }
?>