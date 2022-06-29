<?php
    if(count($_FILES) > 0) {
        $dir = "img/";
        $file = basename($_FILES["sekil"]["name"]);
        $path = $dir . $file;

        $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["sekil"]["tmp_name"]);
        
        $ok = $check && in_array($ext, ["jpg", "png", "jpeg", "gif"]) &&
                !file_exists($path) && $_FILES["sekil"]["size"] < 500000;  

        if ($ok) move_uploaded_file($_FILES["sekil"]["tmp_name"], $path);
    }
?>

<!--
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Document</title>
    </head>
    <body>
        <form action="" method="POST" enctype="multipart/form-data">
            <div><input type="text" name="metn" /></div>
            <div><input type="file" name="sekil" /></div>
            <div><input type="submit" value="Ok" /></div>
        </form>
    </body>
</html>
-->