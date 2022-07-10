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

function scrapeContent($url) {
    $html = file_get_contents($url);
    $dom = new DOMDocument();
    $dom->loadHTML($html);
    return $dom;
}
?>

