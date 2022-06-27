<style>
    form { padding: 50px 30px}
    form>div { padding: 10px 0 }
    label { display: block; font: .6em Arial; color: #666 }
    input {padding: 5px 10px; border: 1px solid#333; border-radius: 5px;}
</style>
<?php
    require_once "../db.php";
    require_once "../function.php";
    $lid = getParam("lid", "1");
    $mid = getParam("mid", "1");

    $sql = "SELECT * FROM `menu` WHERE `id`=$mid";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result)
?>
<form >
    <input name="action" value="medit" type="hidden" />
    <input name="mid" value="<?=$mid?>" type="hidden" />
    <div><label for="morder">Order</label><input name="morder" id="morder" type="number" min="1" max="10" value="<?=$row["order"]?>"/></div>
    <div><label for="mname">Menu name</label><input name="mname" id="mname" type="text" value="<?=$row["name"]?>" /></div>
    <div><input type="submit" value="Ok" /></div>
</form>