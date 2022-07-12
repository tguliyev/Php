<?php
function getParams() {
    foreach($_REQUEST as $key => $value) {
        $GLOBALS[$key] = checkParams($value);
    }
}

function checkParams($value) {
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
}

function scrapeContent($dom, $page, $finder, $url, $query) {
    $page->navigate($url)->waitForNavigation();
    
    @$dom->loadHTML($page->getHtml(30000));
    $finder = new DOMXPath($dom);
    return $finder->query($query);
}
?>

