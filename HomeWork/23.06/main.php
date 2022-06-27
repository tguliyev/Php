<?php

    $sql = 'SELECT `content`.`id`, `title`, `text`, `name` AS `iname`, `alt` FROM `content` LEFT OUTER JOIN `image` ON `content`.`image` = `image`.`id` WHERE `menu`='.$page;
    $result = mysqli_query($conn, $sql);
    if ( $row = mysqli_fetch_assoc($result) ) {
        echo "<h2>" . $row["title"] . "</h2>";
        echo '<img src="img/' . $row["iname"] . '" alt="'.$row["alt"].'">';
        echo html_entity_decode($row["text"]);
    } else {
        echo "<h2> Error 404 !!!</h2>";
        echo "<p>Content not found...</p>";
    }
?>