<?php
    $sql = "SELECT * FROM `content` WHERE `menu`=$page";
    $result = mysqli_query($conn, $sql);
    if ( $row = mysqli_fetch_assoc($result) ) {
        echo "<h2>" . $row["title"] . "</h2>";
        echo '<img src="img/' . $row["image"] . '" alt="">';
        echo $row["text"];
    } else {
        echo "<h2> Error 404 !!!</h2>";
        echo "<p>Content not found...</p>";
    }
?>