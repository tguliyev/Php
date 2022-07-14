<?php
    
    require_once "function.php";
    require __DIR__.'/vendor/autoload.php';
    use HeadlessChromium\BrowserFactory;

    $item_pages = 1;
    
    $browserFactory = new BrowserFactory();
    $browser = $browserFactory->createBrowser();
    $page = $browser->createPage();
    $dom = new DOMDocument();


    $item = scrapeContent($dom, $page, "https://qiymeti.net/qiymetleri/telefon/", '//div[@class="products"]');
    $item = $item[0]->childNodes;

    for ($k=0; $k < count($item) - 1; $k++) {
        echo $item[$k]->childNodes[1]->childNodes[0]->attributes->getNamedItem('href')->nodeValue;
    }

?>