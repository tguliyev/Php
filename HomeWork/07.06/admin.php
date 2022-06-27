<?php 
    require_once "trans.php";
    $lang = isset($_GET["lang"]) ? $_GET["lang"] : 'az';
    $page = isset($_GET["page"]) ? $_GET["page"] : 'main';
    $file = "$lang/$page.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        <link rel="stylesheet" href="style.css" />
        <style>
            textarea { width: 100%; height: 50vh }
        </style>
    </head>
    <body>
        <header><h1>CMS - Content Management System</h1></header>
        <div class="wrapper">
            <nav>
                <form align="center">
                    <select name="lang" onchange="submit()">
                    <?php
                        foreach ($menu as $l => $z) {
                            echo '<option'.($l == $lang ? 'selected' : '').' value="'.$l.'">'.ucfirst($l).'</option>';
                        }
                    ?> 
                    </select>
                </form>
                <ul>
                <?php
                    foreach($menu[$lang] as $p => $m) {
                        echo '<li><a href="?lang='.$lang.'&page='.$p.'">'.$m.'</a></li>';
                    }
                ?>
                </ul>
            </nav>
            <main>
                <textarea name="" cols="80" rows="10"><?=file_get_contents($file)?></textarea>
            </main>
        </div>
        <footer></footer>

        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
            tinymce.init({selector: 'textarea'});
        </script>
    </body>
</html>