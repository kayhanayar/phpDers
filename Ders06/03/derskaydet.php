
<?php
    require_once(__DIR__."/sabitler.php");
    require_once(SABLON_YOL."/linkler.php");
?>

<h1> Ders Kayıt Sayfası</h1>

<form action="./formactions/dbderskaydet.php" method="POST">

    <label for="dersadi"><b>Ders Adı</b></label>
    <input type="text" placeholder="Ders adı" name="dersadi" required>
    <br/>
    <label for="donem"><b>Dönemi</b></label>
    <select name="donem">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>
    <br/>
    <label for="Kredisi"><b>Kredisi</b></label>
    <input type="text" placeholder="Kredisi" name="kredi" required>
    <br/>  
    <input type="submit" value="kaydet">
</form>
<?php
require_once(SABLON_YOL."/taban.php");

?>
</body>

</html>
