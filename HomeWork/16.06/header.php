<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Site</title>
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
        <div class="container">
            <header><h1>Saytım</h1></header>
            <div class="wrapper">
                <nav>
                    <p id="lang">
                    <?php
                        $sql = "SELECT `id`,`short` FROM `language` WHERE `status`=1 ORDER BY `name`";
                        $result = mysqli_query($conn, $sql);
                        while ( $row = mysqli_fetch_assoc($result) ) {
                            echo '<a href="?lang='.$row["id"].'">'.ucfirst($row["short"]).'</a> |';
                        }
                    ?>
                    </p>
                    <ul>
                    <?php
                        $sql = "SELECT * FROM `menu` WHERE `lang`=$lang AND `status`=1 ORDER BY `order`";
                        $result = mysqli_query($conn, $sql);
                        while ( $row = mysqli_fetch_array($result) ) {
                            echo '<li><a href="?page='.$row["id"].'">'.$row["name"].'</a></li>';
                        }
                    ?>
                    </ul>
                </nav>
                <main>
