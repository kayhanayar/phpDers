<?php
    require_once("dbconnection.php");
    require_once("dbfunctions.php");
    yetkiliKullaniciKontrol($db_server);



?>

<html>
<style>
form {
    padding: 16px;
    max-width:600px;
    margin:40px auto;
}
 input[type=text],[type=password],select{
     width: 100%;
     padding: 12px 20px;
     border-radius: 8px;
     border: 2px solid red;
 }   

 input[type=submit],input[type=button] {
    background-color: red;
    border: none;
    color: white;
    padding: 16px 32px;
    margin-top: 10px;
 }

</style>
<body>
<h1> Ders Kayıt Sayfası</h1>

<form action="dbderskaydet.php" method="POST">

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

</body>

</html>
