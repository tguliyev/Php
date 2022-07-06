<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="styles/header.css">
</head>
<body>
    
    <header>
        <div class="top">
            <div class="blocks">
                <img src="assets/qiymeti-logo.png" alt="logo">
                <input type="text" name="search">
                <button>Facebook ilə Giriş</button>
            </div>
        </div>
        <nav>
            <ul>    
                <?php
                $sql = "SELECT * FROM `menu`";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo '<li><a href="/'.strtolower($row['name']).'">'.$row['name'].'</a></li>';   
                }
                ?>
            </ul>
        </nav>
    </header>