    <div class="content">
        <?php
        $sql = "SELECT * FROM `content` WHERE `menu`=$mid LIMIT 1";
        $result = $conn->query($sql);
        if ($row = $result->fetch_assoc()) { ?>
            <div><?=$row['title']?></div>

            <ul id="make">
                <?php
                $sql = "SELECT * FROM `make` WHERE `menu`=$mid ORDER BY `id`";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<li>".$row['name']."</li>";
                }
                ?>
            </ul>



        <?php    
        } else {
            echo "404 not found";
        }
        ?>
    </div>