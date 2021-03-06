        <section id="main" role="main">
            <?php
                $sql = "SELECT * FROM `content` WHERE `menu`=$menu LIMIT 1";
                $result = $conn->query($sql);
                if ($row = $result->fetch_assoc()) $content = $row;
                else {
                    require "404.php";
                    die;
                }
            ?>
            <h1 class="archive-title"><?=$content['title']?></h1>
            <div id="archive">
                <div class="products">
                    <?php
                        $sql = "SELECT `item`.`id`, `item`.`name`, `item`.`image`, `item`.`best_price` FROM `item`, `make` WHERE `make`.`menu`=$menu " . (isset($make) ? " AND `make`.`id`=$make" : "" ). (isset($search) ? " AND `item`.`name` LIKE '%$search%' " : "" ) . " AND `make`.`id`=`item`.`make`;";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="product">
                        <div class="thumbnail">
                            <a href="?item=<?=$row['id']?>">
                                <img width="150" height="150" src="assets/<?=$row['image']?>" class="wp-post-image" alt="<?=basename($row['image'])?>">
                            </a>
                        </div>
                        <div class="name">
                            <a href="?item=<?=$row['id']?>"><?=$row['name']?></a>
                        </div>
                        <div class="min-price">
                            <span><?=$row['best_price']?>
                                <span class="fraction">,00</span>
                            </span> AZN
                        </div>
                    </div>

                    <?php
                        }
                    ?>
                </div>
            </div>

            <div id="category-content"><?=$content['text']?></div>


            <div id="sidebar">
                <ul id="filters">
                    <li class="filter brands" data-group="brands">
                        <div class="filter-header-title">Marka</div>
                        <div class="filter-search"><input id="make_search" type="text" placeholder="Marka axtar"></div>
                        <div class="filter-content" id="make_content">
                        <?php
                            $sql = "SELECT * FROM `make` WHERE `menu`=$menu;";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()) {
                        ?>
                            <div class="option">
                                <label>
                                    <input id="brands-option-1685" type="checkbox" class="checkbox">
                                    <span class="checkmark"></span>
                                    <a class="option-text" href="?menu=<?=$menu?>&make=<?=$row['id']?>"><?=$row['name']?></a>
                                </label>
                            </div>

                        <?php
                            }
                        ?>
                        </div>
                    </li>
                </ul>
            </div>
        </section>