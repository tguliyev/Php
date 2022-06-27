<?php    
    require_once "trans.php";

    $lang =  isset($_GET["lang"]) && array_key_exists($_GET["lang"], $menu) ? $_GET["lang"] : 
            (isset($_COOKIE["lang"]) ? $_COOKIE["lang"] : "az");
    setcookie("lang", $lang, time() + (86400 * 30), "/");
    $page = isset($_GET["page"]) && $_GET["page"] != "index"  ? $_GET["page"] : "main";
    $file = "$lang/$page.php";

    include "header.php";
    include file_exists($file) ? $file : "404.php";
    include "footer.php";
?>