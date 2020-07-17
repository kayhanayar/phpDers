<?php
    require_once(__DIR__."/sabitler.php");
    require_once(SABLON_YOL."/linkler.php");
    kullaniciDersleriGetir($db_server,$_SESSION["kullaniciadi"]);
?>



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
<?php
require_once(SABLON_YOL."/taban.php");

?>
