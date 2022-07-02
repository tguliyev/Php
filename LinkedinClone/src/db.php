<?php
    $host = "localhost";
    $db = "linkedin";
    // print_r(getenv());
    // echo getenv('JAVA_HOME');
    $conn = mysqli_connect($host, $_ENV['db_user'], $_ENV['db_pass'], $db);
?>