<?php
    $day = isset($_GET["day"]) ? $_GET["day"] : "";
    $days = ['Monday', 'Tuseday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            form { display: flex; justify-content: center; }
            span { font-size: 14px; }
            form > * { margin-left: 10px; width: 100px; }
        </style>
    </head>
    <body>
        <form>
            <select name="day">
                <?php
                    for ($i=0; $i < count($days); $i++) {
                        echo '<option '.($day == $days[$i] ? "selected" : "").' value="'.$days[$i].'">'.($i + 1).'</option>';
                    }
                ?>
            </select>
            <button type="submit">Ok</button>
            <?="<span>$day</span>"?>
        </form>
    </body>
</html>