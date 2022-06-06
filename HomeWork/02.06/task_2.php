<?php
$names = isset($_GET["names"]) ? $_GET["names"] : null;
$count = isset($_GET["count"]) ? $_GET["count"] : (isset($names) ? count($names) : 0);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            body { display: flex; }
            form { display: flex; }
            form > * { margin-left: 10px; height: fit-content; width: 100px; }
            span { display: flex; flex-direction: column; }
            input[type="text"] { margin: 5px 0;}
            ul { margin: 0; display: inline-block; }
        </style>
    </head>
    <body>
        <form>
            <select name="count">
                <?php
                for ($i=0; $i < 7; $i++) {
                    echo '<option '.($count == $i ? "selected" : "").' value="'.$i.'">'.$i.'</option>';
                }
                ?>
            </select>
            <button type="submit">Ok</button>
        </form>
        <form>
            <span>
                <?php
                if ($count > 0) {
                    for ($i=0; $i < $count; $i++) {
                        echo '<input type="text" name="names[]">';
                    }
                    echo '<button type="submit">Go</button>';
                }
                ?>
            </span>
            <ul> 
                <?php
                if ($names) {
                    for ($i=0; $i < count($names); $i++) {
                        if ($names[$i] != '') echo "<li>".$names[$i]."</li>";
                    }
                }
                ?>
            </ul>
        </form>
    </body>
</html>