<?php
    require_once "db.php";
    require_once "function.php";


    $sql = "SELECT * FROM `content`, `image` WHERE `content.id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    print_r($row);
    // getParams();

    // echo $bir;
    // echo $iki;
    // echo $uch;
?>

<!-- <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form method="POST" >
            <div><input type="text" name="bir" id=""></div>
            <div><input type="text" name="iki" id=""></div>
            <div><input type="text" name="uch" id=""></div>
            <div><input type="submit" name="ok" value="Ok"></div>
        </form>
    </body>
</html> -->