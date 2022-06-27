<?php    
    include "trans.php";

    $lang = isset($_GET["lang"]) && array_key_exists($_GET["lang"], $menu) ? $_GET["lang"] : "az";
    $page = isset($_GET["page"]) && $_GET["page"] != "index"  ? $_GET["page"] : "main";
    $file = "$lang/$page.php";

    include "header.php";
    include file_exists($file) ? $file : "404.php";
    include "footer.php";
?>