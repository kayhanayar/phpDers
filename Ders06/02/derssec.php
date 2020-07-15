<?php
    require_once("./sabitler.php");
    require_once(DB_YOL."/dbconnection.php");
    require_once(DB_YOL."/dbfunctions.php");

    yetkiliKullaniciKontrol($db_server);
?>
<html>
<body>
<style>
    
table, th, td {
  border: 1px solid black;
}

</style>
<form action="./formactions/dbdersseckaydet.php" method="POST">
<table>
    <tr>
        <th>Ders adı</th>
        <th>Dönemi</th>
        <th>Kredi</th>  
        <th>Seçim</th>   
    </tr>
<?php

$dersler=dersleriGetir($db_server);

if($dersler->num_rows>0)
{
    while($row = siradakiDers($dersler)){
        $dersadi = $row['dersadi'];
        echo "<tr>";
        echo "<td>".$row["dersadi"]."</td>";
        echo "<td>".$row["donem"]."</td>";
        echo "<td>".$row["kredi"]."</td>";
        echo "<td><input type='checkbox'  name='dersler[]' value='$dersadi'></td>";
        echo "<tr/>";
        
    }

    
}

?>
</table>

<input type="submit" value="kaydet">


</form>

</body>
</html>