<?php
    $db_host = "localhost";
    $db_name = "linkedin";

    $conn = new mysqli($db_host, $_ENV['db_user'], $_ENV['db_pass'], $db_name);
?>