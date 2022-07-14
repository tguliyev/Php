<?php
    $sql = "SELECT * FROM `item` WHERE `id`=$item LIMIT 1";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if (!$row) {
        header("Location: 404.php");
        die;
    }
?>
    <div id="wrapper">

        <div id="main">
            <div id="product">
                <div class="main">
                    <section id="qiymetleri">
                        <h1 class="title"><?=$row['name']?></h1>
                        <div class="content">
                            <div class="product-image">
                                <img width="280" height="280" src="assets/<?=$row['image']?>" class="attachment-medium size-medium wp-post-image" alt="Samsung Galaxy A52" title="Samsung Galaxy A52">
                            </div>
                            <div class="prices-wrapper">
                                <h2><?=$row['name']?> <b>qiymeti</b></h2>
                                <p class="price-info" style="padding: 5px 0 5px 5px;text-align: left;margin: 0;"><?=$row['desc']?></p>

                                <div class="table" id="prices-table">

                                    <?php
                                        $sql = "SELECT `item_price`.`price`, `item_price`.`link`, `item_price`.`title`, `shop`.`logo` FROM `item_price`, `shop` WHERE `item`=$item AND `item_price`.`shop`=`shop`.`id` ORDER BY `price`;";
                                        $result = $conn->query($sql);
                                        while ($row = $result->fetch_assoc()) {
        
                                    ?>
                                    <a target="_blank" href="<?=$row['link']?>" class="price-row almali" id="price-38141">
                                        <div class="shop"><img width="103" height="30" alt="almali.store mağazaları" src="assets/<?=$row['logo']?>" ></div>
                                        <div class="model">
                                            <div class="product-url">
                                                <div class="spec-values"><?=$row['title']?></div>
                                            </div>
                                        </div>
                                        <div class="buy-wrapper">
                                            <div class="price"><span class="value"><?=$row['price']?><span class="fraction">,00</span></span><span class="currency"> AZN</span></div>
                                            <div class="open">
                                                <div class="buy">Satın al<span class="icon"></span></div>
                                            </div>
                                        </div>
                                    </a>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

            </div>
        </div>

    </div>