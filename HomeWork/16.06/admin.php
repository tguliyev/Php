<?php
    require_once "db.php";
    require_once "function.php";

    $action = getParam("action", "");
    $lid = getParam("lid", "");
    $lshort = getParam("lshort", "");
    $lname = getParam("lname", "");
    $lstat = getParam("lstat", "");
    
    $sql = "";

    if($action == "ladd" && checkParams([$lshort, $lname])) {
        $sql = 'INSERT INTO `language` (`short`,`name`,`status`) VALUES ("'.$lshort.'", "'.$lname.'", 0)';
    } elseif ($action == "ldel") {
        $sql = "DELETE FROM `language` WHERE `id`=$lid";
    } elseif ($action == "lstat") {
        $sql = "UPDATE `language` SET `status`=".(1 - $lstat)." WHERE id=$lid";
    } elseif ($action == "ledit") {
        $sql = 'UPDATE `language` SET `short`="'.$lshort.'", `name`="'.$lname.'" WHERE id='.$lid;
    }
    if($sql != "") mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Admin</title>
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/admin.css" />
    </head>
    <body>
        <header>
            <h1>CMS - Content Management System</h1>
        </header>
        <div class="wrapper">
            <nav>
                <table>
                <?php
                    $sql = "SELECT * FROM `language`";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                        echo '
                        <tr>
                            <td>'.$row["short"].'</td>
                            <td>'.$row["name"].'</td>
                            <td>
                                <a href="?action=lstat&lid='.$row["id"].'&lstat='.$row["status"].'"><i class="far fa'.($row["status"] ? "-check" : "").'-square"></i></a>
                                <a onclick="ledit('.$row["id"].',\''.$row["short"].'\',\''.$row["name"].'\')"><i class="far fa-edit"></i></a>
                                <a href="?action=ldel&lid='.$row["id"].'"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        ';
                    }
                ?>
                    <tr>
                        <form action="">
                        <input type="hidden" name="action" value="ladd" >
                        <input type="hidden" name="lid" value="" >
                        <td><input type="text" name="lshort" class="short" maxlength="2"></td>
                        <td><input type="text" name="lname" ></td>
                        <td><input type="submit" value="Add" id="lbtn"></td>
                        </form>
                    </tr>
                </table>
            </nav>
            <main></main>
        </div>
        <footer></footer>

        <script src="https://kit.fontawesome.com/30908b1d2e.js" crossorigin="anonymous"></script>
        <script>
            function ledit(lid, lshort, lname) {
                document.querySelector('[name=action]').value = "ledit"
                document.querySelector('[name=lid]').value = lid
                document.querySelector('[name=lshort]').value = lshort
                document.querySelector('[name=lname]').value = lname
                document.getElementById('lbtn').value = "Edit"
            }
        </script>
    </body>
</html>


<?php
    mysqli_close($conn);
?>