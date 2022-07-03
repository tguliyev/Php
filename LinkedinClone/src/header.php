<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/header.css">
</head>
<body>
    <header>
        <nav>
            <img  width="41px" height="41px" src="assets/logo.svg" alt="logo">
            <input type="text" name="search">
            <ul>
            <?php
                $sql = "SELECT * FROM `meny` ORDER BY `order`";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <li>
                    <a href="<?=(is_dir(str_replace(' ', '',  $row['name'])) ? "http://".$_SERVER['HTTP_HOST']."/".str_replace(' ', '',  $row['name']) : '')?>">
                        <?=($row['icon'] ? ('<img src="assets/'.$row['icon'].'" alt="'.pathinfo($row['icon'], PATHINFO_FILENAME).'">') : '')?>
                        <p><?=ucwords($row['name'])?></p>
                    </a>
                </li>
            <?php }?>
            </ul>
        </nav>
    </header>