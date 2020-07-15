<?php
    require_once("./sabitler.php");
    require_once(DB_YOL."/dbconnection.php");
    require_once(DB_YOL."/dbfunctions.php");

    yetkiliKullaniciKontrol($db_server);
    kullaniciDersleriGetir($db_server,$_SESSION["kullaniciadi"]);
?>
<html>
<body>
<style>
    
table, th, td {
  border: 1px solid black;
}

</style>
<form action="./formactions/dbseciliderssil.php" method="POST">
<table>
    <tr>
        <th>Ders adı</th>
        <th>Dönemi</th>
        <th>Kredi</th>  
        <th>Seçim</th>   
    </tr>
<?php

$dersler=kullaniciDersleriGetir($db_server,$_SESSION["kullaniciadi"]);

if($dersler->num_rows>0)
{
    while($row = siradakiDers($dersler)){

        $dersadi = $row['dersadi'];
        $dersbilgileri = dersGetir($db_server,$dersadi);
       
        echo "<tr>";
        echo "<td>".$dersbilgileri["dersadi"]."</td>";
        echo "<td>".$dersbilgileri["donem"]."</td>";
        echo "<td>".$dersbilgileri["kredi"]."</td>";
        echo "<td><input type='checkbox'  name='dersler[]' value='$dersadi'></td>";
        echo "<tr/>";
        
    }

    
}

?>
</table>

<input type="submit" value="sil">


</form>

</body>
</html>