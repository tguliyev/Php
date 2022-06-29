<?php
    session_start();
    require_once "function.php";
    require_once "db.php";
    
    getParams();
    
    if (isset($user) && isset($pass)) {
        $sql = 'SELECT * FROM `user` WHERE `name`="'.$user.'" LIMIT 1';
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if($user == $row['name'] && password_verify($pass, $row['password'])) {
            $_SESSION["user"] = $user;
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
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/login.css" />
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
                <a href="signup.php">Sign Up</a>
            </form>
        </main>
    </body>
</html>

<?php
    mysqli_close($conn);
?>