<?php
    require_once "function.php";
    require_once "db.php";

    getParams();
    if (isset($pass) && isset($user) && isset($repass)) {
        if ($pass && $user && $pass == $repass) {
            $pass = password_hash($pass, PASSWORD_DEFAULT);
            $sql = 'INSERT INTO `user` (`name`, `password`) VALUES ("'.$user.'", "'.$pass.'")';
            mysqli_query($conn, $sql);
            header("Location: login.php");
            die();
        } else $msg = 'Enter valid credentials';
    } else $msg = '';
    
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
        <header><h1>CMS Sign Up</h1></header>
        <main>
            <form action="" method="POST">
                <label for="user">User name</label>
                <input type="text" name="user" id="user" placeholder="User name" />
                <label for="pass">Password</label>
                <input type="password" name="pass" placeholder="Your password" />
                <label for="repass">Re enter password</label>
                <input type="password" name="repass" placeholder="Confirm your password" />
                <p id="msg"><?=$msg?></p>
                <input type="submit" value="Sign Up"  />
            </form>
        </main>
    </body>
</html>

<?php
    mysqli_close($conn);
?>