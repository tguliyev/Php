<?php
    session_start();
    require_once "user.php";

    if (isset($_POST["user"]) && isset($_POST["pass"])) {
        if($_POST["user"] == $u && $_POST["pass"] == $p) {
            $_SESSION["user"] = $_POST["user"];
            header("Location: admin.php");
            die();
        } else {
            $msg = "Istifadeci adini ve parolunu duz yaz";
        }
    } else $msg = "";
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="login.css" />
    </head>
    <body>
        <header><h1>CMS Login</h1></header>
        <main>
            <form action="" method="POST">
                <label for="user">User name</label>
                <input type="text" name="user" id="user" placeholder="User name" />
                <label for="pass">Password</label>
                <input type="password" name="pass" id="pass" placeholder="Your password" />
                <p id="msg"><?=$msg?></p>
                <input type="submit" value="Log in"  />
            </form>
        </main>
    </body>
</html>