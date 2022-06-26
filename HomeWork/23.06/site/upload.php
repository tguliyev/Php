<?php
    if(count($_FILES) > 0 && $_FILES['sekil']['size'] > 0) {
        $dir = "img/";
        $file = basename($_FILES["sekil"]["name"]);
        $path = $dir . $file;

        $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["sekil"]["tmp_name"]);
        
        $ok = $check && in_array($ext, ["jpg", "png", "jpeg", "gif"]) &&
                !file_exists($path) /*&& $_FILES["sekil"]["size"] < 500000*/;

        if ($ok) {
            move_uploaded_file($_FILES["sekil"]["tmp_name"], $path);
            $sql = 'INSERT INTO `image` (`name`, `alt`) VALUES ("'.$file.'", "'.pathinfo($file, PATHINFO_FILENAME).'")';
            mysqli_query($conn, $sql);
            $iid = mysqli_insert_id($conn);
        } else {
            $sql = 'SELECT `id` FROM `image` WHERE `name`="'.$file.'"';
            $result = mysqli_query($conn, $sql);
            $iid = mysqli_fetch_assoc($result)['id'];
        }
    }
?>