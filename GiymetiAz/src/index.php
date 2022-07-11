<?php
    require_once "db.php";
    require_once "function.php";

    $menu = 1;
    getParams();

    require "header.php";
    
    if (isset($item) && $item) require "item.php";
    else require "main.php";

    require "footer.php";
?>