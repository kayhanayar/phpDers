
<?php
    require_once(__DIR__."/sabitler.php");
    require_once(SABLON_YOL."/linkler.php");
?>

<form action="./formactions/dbderssil.php" method="POST">
<table>
    <tr>
        <th>Ders adı</th>
        <th>Dönemi</th>
        <th>Kredi</th>  
        <th>Seçim</th>   
    </tr>
<?php

$dersler=dersleriGetir($db_server);


if($dersler!=null&&$dersler->num_rows>0)
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

<input type="submit" value="sil">


</form>
<?php
require_once(SABLON_YOL."/taban.php");

?>
