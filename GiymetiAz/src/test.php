<?php
    require_once "function.php";
    require __DIR__.'/vendor/autoload.php';
    use HeadlessChromium\BrowserFactory;

    $item_pages = 1;
    
    $browserFactory = new BrowserFactory();
    $browser = $browserFactory->createBrowser();
    $page = $browser->createPage();
    $dom = new DOMDocument();

    $item_page = scrapeContent($dom, $page, "https://qiymeti.net/telefon/samsung-galaxy-a52/", '//*[@class="content"]');

    // print_r($item_page[0]->childNodes);
    echo $item_page[0]->childNodes[1]->childNodes[1]->attributes->getNamedItem('src')->nodeValue;
?>