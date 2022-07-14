<?php
    require_once "db.php";
    require_once "function.php";
    require __DIR__.'/vendor/autoload.php';
    use HeadlessChromium\BrowserFactory;

    $item_pages = 2;
    
    $browserFactory = new BrowserFactory();
    $browser = $browserFactory->createBrowser();
    $page = $browser->createPage();
    $dom = new DOMDocument();

    try {
        // Get menu ids
        $menu_id = getMenuId($conn);
        // Get target menu links
        $menu_link = getMenuLink($dom, $page);

        for ($i=4; $i < count($menu_id); $i++) {

            // Add all Makes
            addMake($dom, $page, $conn, $menu_link, $menu_id, $i);

            // Get Items Info
            getItemsInfo($conn, $dom, $page, $menu_link, $item_pages, $i);
        }

    } finally {
        $browser->close();
    }
?>