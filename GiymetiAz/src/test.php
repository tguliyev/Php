<?php
    require_once "function.php";
    require __DIR__.'/vendor/autoload.php';
    use HeadlessChromium\BrowserFactory;

    $item_pages = 1;
    
    $browserFactory = new BrowserFactory();
    $browser = $browserFactory->createBrowser();
    $page = $browser->createPage();
    $dom = new DOMDocument();
    $finder = null;

    $item_page = scrapeContent($dom, $page, $finder, "https://qiymeti.net/telefon/samsung-galaxy-a52/", '//*[@class="content"]');


    for ($i=2; $i < count($item_page[0]->childNodes[3]->childNodes[12]->childNodes) - 1; $i++) { 
        echo "<br>";

        $shop_link = $item_page[0]->childNodes[3]->childNodes[12]->childNodes[$i]->attributes->getNamedItem('href')->nodeValue;
        echo "<br>";

        $shop_price = intval($item_page[0]->childNodes[3]->childNodes[12]->childNodes[$i]->attributes->getNamedItem('data-price')->nodeValue);
        echo "<br>";

        $shop_name = $item_page[0]->childNodes[3]->childNodes[12]->childNodes[$i]->attributes->getNamedItem('data-company')->nodeValue;
        echo $shop_name;
        echo "<br>";

        $shop_logo = "https://qiymeti.net/wp-content/themes/qiymeti-theme/images/companies/$shop_name.png";
        echo "<br>";

        $shop_title = $item_page[0]->childNodes[3]->childNodes[12]->childNodes[$i]->childNodes[1]->childNodes[0]->childNodes[0]->nodeValue;
        echo "<br>";

    }

?>