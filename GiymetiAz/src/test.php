<?php
    require_once "function.php";
    require __DIR__.'/vendor/autoload.php';
    use HeadlessChromium\BrowserFactory;

    $item_pages = 1;
    
    $browserFactory = new BrowserFactory();
    $browser = $browserFactory->createBrowser();
    $page = $browser->createPage();
    $dom = new DOMDocument();

    // $item_page = scrapeContent($dom, $page, "https://qiymeti.net/telefon/samsung-galaxy-a52/", '//*[@class="content"]');

    $price_row = scrapeContent($dom, $page, "https://qiymeti.net/telefon/samsung-galaxy-a52/", '//a[contains(@class, "price-row")]');
    // $price_count = count($info[0]->childNodes[3]->childNodes[12]->childNodes) - 1;
    for ($h=0; $h < count($price_row); $h++) { 

        $shop_row = [];
        $shop_row['shop_link'] = $price_row[$h]->attributes->getNamedItem('href')->nodeValue;

        $shop_row['shop_price'] = intval($price_row[$h]->attributes->getNamedItem('data-price')->nodeValue);

        $shop_row['shop_name'] = $price_row[$h]->attributes->getNamedItem('data-company')->nodeValue;

        $shop_row['shop_logo'] = loadImage("https://qiymeti.net/wp-content/themes/qiymeti-theme/images/companies/".$shop_row['shop_name'].".png");

        $shop_row['shop_title'] = $price_row[$h]->childNodes[1]->childNodes[0]->childNodes[0]->nodeValue;
        print_r($shop_row);
    }


    function loadImage($url) {
        $path = "assets/";
        $img = basename(strtok($url, "?"));
        if (!file_exists($path.$img)) {
            file_put_contents($path.$img, file_get_contents($url));
        }
        return $img;
    }

?>