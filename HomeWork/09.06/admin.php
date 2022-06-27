<?php 
    session_start();

    require_once "trans.php";
    require_once "function.php";
    getParams();
    // $lang = isset($_GET["lang"]) ? $_GET["lang"] : 'az';
    // $page = isset($_GET["page"]) ? $_GET["page"] : 'main';
    // $text = isset($_GET["text"]) ? $_GET["text"] : '';
    // $action = isset($_GET["action"]) ? $_GET["action"] : '';
    $file = "$lang/$page.php";

    if ($action == 'logout' || !isset($_SESSION["user"])) {
        session_unset();
        session_destroy();
        header("Location: login.php");
        die();
    }

    if ($text != '') {
        file_put_contents($file, $text);
    }
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
                <?php
                    foreach ($menu as $l => $z) {
                        echo '<label><input '.($l == $lang ? 'checked="checked"' : '').' onclick="submit()" type="radio" value="'.$l.'" name="lang" > '.ucfirst($l).'</label>';
                    }
                ?> 
                </form>
                <ul>
                <?php
                    foreach($menu[$lang] as $p => $m) {
                        echo '<li><a href="?lang='.$lang.'&page='.$p.'">'.$m.'</a></li>';
                    }
                ?>
                </ul>

                <?php
                    echo '<p>Istifadeci: <b>'.$_SESSION["user"].'</b> 
                        (<a href="?action=logout">Log out</a>)</p>';
                    
                ?>
            </nav>
            <main>
                <form action="">
                    <input name="lang" type="hidden"  value="<?=$lang?>" />
                    <input name="page" type="hidden" value="<?=$page?>" />
                    <textarea name="text" cols="80" rows="10"><?php if (file_exists($file)) echo file_get_contents($file); ?></textarea>
                    <input type="submit" value="Ok" />
                </form>
            </main>
        </div>
        <footer></footer>

        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
            tinymce.init({
                selector: 'textarea',
                plugins: [
                'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
                'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
                'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
                ],
                toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
                'alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'
            });
        </script>
    </body>
</html>