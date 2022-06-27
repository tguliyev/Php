<style>
    form { padding: 50px 30px}
    form>div { padding: 10px 0 }
    label { display: block; font: .6em Arial; color: #666 }
    input {padding: 5px 10px; border: 1px solid#333; border-radius: 5px;}
</style>
<?php
    require_once "../function.php";
    $lid = getParam("lid", "1");
    $mid = getParam("mid", "1");
?>

<form>
    <h3>Silmək istədiyinizdən əminsinizmi ?!?!?!?!</h3>
    <input type="hidden" name="action" value="mdel">
    <input type="hidden" name="lid" value="<?=$lid?>">
    <input type="hidden" name="mid" value="<?=$mid?>">
    <input type="submit" value="Hə" />
</form>

<button onclick="modal()">YOX!!!</button>