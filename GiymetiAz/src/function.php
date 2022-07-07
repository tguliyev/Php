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
?>