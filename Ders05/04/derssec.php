<?php
    require_once("db.php");
    yetkiliKullaniciKontrol($db_server);
?>
<html>
<body>
<style>
    
table, th, td {
  border: 1px solid black;
}

</style>
<form action="dbdersseckaydet.php" method="POST">
<table>
    <tr>
        <th>Ders adı</th>
        <th>Dönemi</th>
        <th>Kredi</th>  
        <th>Seçim</th>   
    </tr>
<?php

$dersler=dersleriGetir($db_server);
$derssayisi = 0;
if($dersler->num_rows>0)
{
    while($row = siradakiDers($dersler)){
        $dersadi = $row['dersadi'];
        echo "<tr>";
        echo "<td>".$row["dersadi"]."</td>";
        echo "<td>".$row["donem"]."</td>";
        echo "<td>".$row["kredi"]."</td>";
        echo "<td><input type='checkbox'  name='$derssayisi' value='$dersadi'></td>";
        echo "<tr/>";
        $derssayisi++;
    }

    
}

?>
</table>

<input type="submit" value="kaydet">

<input type="hidden" name="dersSayisi" value='<?php echo $derssayisi ?>'>

</form>

</body>
</html>