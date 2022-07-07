    <div class="content">
        <?php
        $sql = "SELECT * FROM `category` WHERE `id`=$mid LIMIT 1";
        $result = $conn->query($sql);
        if ($row = $result->fetch_assoc()) {
            echo $row['name'];
        }
        ?>
    </div>