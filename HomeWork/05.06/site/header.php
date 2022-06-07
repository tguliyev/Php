<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Site</title>
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <div class="container">
            <header><h1>Saytım</h1></header>
            <div class="wrapper">
                <nav>
                    <p id="lang">
                    <?php
                        foreach ($menu as $d => $z) {
                            echo '<a href="?lang='.$d.'">'.ucfirst($d).'</a> |';
                        }
                    ?>

                    </p>
                    <ul>
                    <?php
                        foreach($menu[$lang] as $f => $m) {
                            echo '<li><a href="?lang='.$lang.'&page='.$f.'">'.$m.'</a></li>';
                        }
                    ?>
                    </ul>
                </nav>
                <main>
