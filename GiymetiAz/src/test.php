<?php
    require_once "db.php";

    $item_data = [
        'link' => "https://qiymeti.net/telefon/samsung-galaxy-a12/",
        'make' => 'Samsung',
        'name' => 'Samsung Galaxy A12',
        'min-price' => 329,
        'img' => 'samsung-galaxy-a12-qiymeti-280x280.jpg',
        'desc' => 'Mağazalarda Samsung Galaxy A12 ən ucuz 329 manata satılır (qiymeti 19 saat əvvəl yenilənib). Mağazalardakı qiymetleri aşağıdakı siyahıda ən ucuzdan bahaya doğru sıralanıb. "Satın al" klikləyərək məhsulun mağazadakı satış səhifəsinə keçid edə bilərsiniz. İstədiyiniz yaddaş, rəng və ya RAM xüsusiyyətlərini aşağıdakı filtrlərdən seçə bilərsiniz.',
        'price_list' => [
                0 => Array
                    (
                        'shop_link' => 'https://qiymeti.net/get/38090/',
                        'shop_price' => 329,
                        'shop_name' => 'almali',
                        'shop_logo' => 'almali.png',
                        'shop_title' => '32 GB, Blue, 3 GB, Dual'
                    ),
    
                1 => Array
                    (
                        'shop_link' => 'https://qiymeti.net/get/38088/',
                        'shop_price' => 329,
                        'shop_name' => 'almali',
                        'shop_logo' => 'almali.png',
                        'shop_title' => '32 GB, Black, 3 GB, Dual'
                    ),
    
                2 => Array
                    (
                        'shop_link'=> 'https://qiymeti.net/get/38093/',
                        'shop_price' => 379,
                        'shop_name'=> 'almali',
                        'shop_logo'=> 'almali.png',
                        'shop_title' => '64 GB, Blue, 4 GB, Dual'
                    ),
    
                3 => Array
                    (
                        'shop_link' => 'https://qiymeti.net/get/38092/',
                        'shop_price' => 379,
                        'shop_name' => 'almali',
                        'shop_logo' => 'almali.png',
                        'shop_title' => '64 GB, Red, 4 GB, Dual'
                    ),
    
                4 => Array
                    (
                        'shop_link' => 'https://qiymeti.net/get/38094/',
                        'shop_price' => 379,
                        'shop_name' => 'almali',
                        'shop_logo' => 'almali.png',
                        'shop_title' => '64 GB, Black, 4 GB, Dual'
                    ),
    
                5 => Array
                    (
                        'shop_link' => 'https://qiymeti.net/get/38724/',
                        'shop_price' => 389,
                        'shop_name' => 'mgstore',
                        'shop_logo' => 'mgstore.png',
                        'shop_title' => '64 GB, Red, 4 GB, Dual'
                    ),
    
                6 => Array
                    (
                        'shop_link' => 'https://qiymeti.net/get/38097/',
                        'shop_price' => 429,
                        'shop_name' => 'almali',
                        'shop_logo' => 'almali.png',
                        'shop_title' => '128 GB, Black, 4 GB, Dual'
                    ),
    
                7 => Array
                    (
                        'shop_link' => 'https://qiymeti.net/get/38096/',
                        'shop_price' => 429,
                        'shop_name' => 'almali',
                        'shop_logo' => 'almali.png',
                        'shop_title' => '128 GB, Blue, 4 GB, Dual'
                    ),
    
                8 => Array
                    (
                        'shop_link' => 'https://qiymeti.net/get/38095/',
                        'shop_price' => 429,
                        'shop_name' => 'almali',
                        'shop_logo' => 'almali.png',
                        'shop_title' => '128 GB, Red, 4 GB, Dual'
                    ),
    
                9 => Array
                    (
                        'shop_link' => 'https://qiymeti.net/get/28068/',
                        'shop_price' => 432,
                        'shop_name' => 'arshinmall',
                        'shop_logo' => 'arshinmall.png',
                        'shop_title' => '64 GB, White, 4 GB, Dual'
                    ),
    
                10 => Array
                    (
                        'shop_link' => 'https://qiymeti.net/get/29706/',
                        'shop_price' => 473,
                        'shop_name' => 'arshinmall',
                        'shop_logo' => 'arshinmall.png',
                        'shop_title' => '128 GB, Blue, 4 GB, Dual'
                    ),
    
            ]
    
    ];

    
    $sql = "SELECT `id` FROM `make` WHERE `name`='".$item_data['make']."' LIMIT 1";
    $result = $conn->query($sql);
    $make_id = $result->fetch_assoc()['id'];
    
    $sql = "INSERT IGNORE INTO `item` (`name`, `image`, `best_price`, `make`, `desc`) VALUES ('".$item_data['name']."', '".$item_data['img']."', '".$item_data['min-price']."', '".$make_id."', '".$item_data['desc']."');";
    $conn->query($sql);
    
    for ($i=0; $i < count($item_data['price_list']); $i++) {
        echo $i; 
        $sql = "INSERT IGNORE INTO `shop` (`name`, `logo`) VALUES ('".$item_data['price_list'][$i]['shop_name']."', '".$item_data['price_list'][$i]['shop_logo']."')";
        $conn->query($sql);
        
        $sql = "SELECT `id` FROM `item` WHERE `name`='".$item_data['name']."' LIMIT 1";
        $result = $conn->query($sql);
        $item_id = $result->fetch_assoc()['id'];
        
        $sql = "SELECT `id` FROM `shop` WHERE `name`='".$item_data['price_list'][$i]['shop_name']."' LIMIT 1";
        $result = $conn->query($sql);
        $shop_id = $result->fetch_assoc()['id'];
        
        
        $sql = "SELECT * FROM `item_price` WHERE `item`=".$item_id." AND `shop`=".$shop_id." AND `title`='".$item_data['price_list'][$i]['shop_title']."' LIMIT 1";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if ($row) {
            if($row['price'] != $item_data['price_list'][$i]['shop_price']) {
                $sql = "UPDATE `item_price` SET `price`=".$item_data['price_list'][$i]['shop_price']." WHERE `item`=".$item_id." AND `shop`=".$shop_id." AND `title`='".$item_data['price_list'][$i]['shop_title']."';";
                $result = $conn->query($sql);
            }
        } else {
            
            $sql = "INSERT INTO `item_price` (`price`, `shop`, `item`, `link`, `title`) VALUES (".$item_data['price_list'][$i]['shop_price'].", ".$shop_id.", ".$item_id.", '".$item_data['price_list'][$i]['shop_link']."', '".$item_data['price_list'][$i]['shop_title']."')";
            $result = $conn->query($sql);
        }

    }
    
    
    
    
    
    
    
    print_r($item_data);

?>