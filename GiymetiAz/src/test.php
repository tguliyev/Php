<?php
    require __DIR__.'/vendor/autoload.php';
    use HeadlessChromium\BrowserFactory;
    
    $browserFactory = new BrowserFactory();
    $browser = $browserFactory->createBrowser();

    try {
        // creates a new page and navigate to an URL
        $page = $browser->createPage();
        $page->navigate('https://kontakt.az/telefonlar/mobil-telefonlar/')->waitForNavigation();

        
        for ($i=0; $i < 1; $i++) { 
            $page->evaluate('document.getElementsByClassName("styles_loadMore__9YIfJ styles_paletteLoadMore__4CXTH")[0].click()')->getReturnValue();
            sleep(5);
        }
        // echo $page->getHtml();

        $dom = new DOMDocument();
        @$dom->loadHTML($page->getHtml());
        
        $finder = new DOMXPath($dom);
        $query = '//div[contains(@class,"styles_baseInfo__PLU_Z")]';
        $items = $finder->query($query);
        
        print_r($items);

        echo '<br>';
        // echo $items->item(0)->childNodes->item(0)->childNodes->item(0)->childNodes->item(0)->nodeValue;
        
        foreach ($items as $item) {
            echo $item->nodeValue;
            echo '<br>';
        }

    } catch (Exception $e) {
        echo $e;
        echo "Error";
    } finally {
        $browser->close();
    }
?>