<?php
    require_once "db.php";
    require_once "function.php";

    $action = getParam("action", "");
    $lid = getParam("lid", "1");
    $lshort = getParam("lshort", "");
    $lname = getParam("lname", "");
    $lstat = getParam("lstat", "");
    $mid = getParam("mid", "");
    $morder = getParam("morder", "");
    $mname = getParam("mname", "");
    $mstat = getParam("mstat", "");
    
    $sql = "";

    if($action == "ladd" && checkParams([$lshort, $lname])) {
        $sql = 'INSERT INTO `language` (`short`,`name`,`status`) VALUES ("'.$lshort.'", "'.$lname.'", 0)';
    } elseif ($action == "ldel") {
        $sql = "DELETE FROM `language` WHERE `id`=$lid";
    } elseif ($action == "lstat") {
        $sql = "UPDATE `language` SET `status`=".(1 - $lstat)." WHERE id=$lid";
    } elseif ($action == "ledit") {
        $sql = 'UPDATE `language` SET `short`="'.$lshort.'", `name`="'.$lname.'" WHERE id='.$lid;
    } elseif ($action == "mstat") {
        $sql = "UPDATE `menu` SET `status`=".(1 - $mstat)." WHERE id=$mid";
    } elseif ($action == "madd" && checkParams([$morder, $mname])) {
        $sql = 'INSERT INTO `menu` (`lang`,`order`,`name`,`status`) VALUES ('.$lid.', '.$morder.', "'.$mname.'", 0)';
    } elseif ($action == "mdel") {
        $sql = "DELETE FROM `menu` WHERE `mid`=$lid";
    } elseif ($action == "medit") {
        $sql = 'UPDATE `menu` SET `name`="'.$mname.'", `order`="'.$morder.'" WHERE `id`="'.$mid.'"';
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
        <link rel="stylesheet" href="css/modal.css" />
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
                            <td><a href="?lid='.$row["id"].'">'.$row["name"].'</a></td>
                            <td>
                                <a href="?action=lstat&lid='.$row["id"].'&lstat='.$row["status"].'">
                                    <i class="far fa'.($row["status"] ? "-check" : "").'-square"></i>
                                </a>
                                <a onclick="ledit('.$row["id"].',\''.$row["short"].'\',\''.$row["name"].'\')">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="?action=ldel&lid='.$row["id"].'">
                                    <i class="far fa-trash-alt"></i>
                                </a>
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
                        <td><input type="text" name="lname" class="inp" ></td>
                        <td><input type="submit" value="Add" id="lbtn"></td>
                        </form>
                    </tr>
                </table>
                <hr />
                <table>
                    <tr>
                        <td colspan="3"><i onclick="modal('admin/madd.php?lid=<?=$lid?>')" class="fas fa-plus-circle"></i></td>
                    </tr>
                    <?php
                        $sql = "SELECT * FROM `menu` WHERE `lang`=$lid ORDER BY `order`";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result)){
                            echo '
                                <tr>
                                    <td>'.$row["order"].'</td>
                                    <td>'.$row["name"].'</td>
                                    <td>
                                        <a href="?action=mstat&lid='.$lid.'&mid='.$row["id"].'&mstat='.$row["status"].'">
                                            <i class="far fa'.($row["status"] ? "-check" : "").'-square"></i>
                                        </a>
                                        <i onclick="modal(\'admin/medit.php?lid='.$lid.'&mid='.$mid.'\')"
                                            class="far fa-edit"></i>
                                        <i onclick="modal(\'admin/mdel.php?lid='.$lid.'&mid='.$mid.'\')"
                                            class="far fa-trash-alt"></i>
                                    </td>
                                </tr>
                            ';
                        }
                    ?>
                </table>
            </nav>
            <main></main>
        </div>
        <footer></footer>

        <div id="modal">
            <div class="win">
                <button class="close" onclick="modal()">×</button>
                <div class="content"></div>
            </div>
        </div>

        <script src="https://kit.fontawesome.com/30908b1d2e.js" crossorigin="anonymous"></script>
        <script>

            async function modal(content = "") {
                document.querySelector("#modal").style.display = content ? "flex" : "none" 
                if (content != "") {
                    let c = await fetch(content)
                    document.querySelector("#modal .content").innerHTML = await c.text()
                }  
            }

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