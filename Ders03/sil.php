<html>
<body>
<style>
    
table, th, td {
  border: 1px solid black;
}

</style>
<?php

$db_hostname = "localhost";
$db_database = "dbsite";
$db_username ="kayhan";
$db_password ="123";

$db_server = mysqli_connect($db_hostname,$db_username,$db_password);

if(!$db_server)
    echo "mysql'e bağlanamadı".mysqli_error($db_server);

mysqli_select_db($db_server,$db_database);

if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
    echo $_POST["secilenkullanici"];
    $silinecekKullanici = $_POST["secilenkullanici"];
    $query = "delete from kullanicilar where kullaniciadi='$silinecekKullanici'";
    $result = mysqli_query($db_server,$query);
}

$query = "select * from kullanicilar";

$result = mysqli_query($db_server,$query);

if($result->num_rows>0)
{
    
    echo "<table>";
    while($row = $result->fetch_assoc()){
       
        echo "<tr>";
        echo "<td>Kullanici Adi:</td><td>".$row["kullaniciadi"]."</td>";
        echo "<tr/>";
        echo "<tr>";
        echo "<td>Adi:</td><td>".$row["adi"]."</td>";
        echo "<tr/>";
        echo "<tr>";
        echo "<td>Soyadi:</td><td>".$row["soyadi"]."</td>";
        echo "<tr/>";
        echo "<tr>";
        echo "<td>e-mail:</td><td>".$row["email"]."</td>";
        echo "<tr/>";
        echo "<form action='sil.php' method='POST'>";
        echo "<input type='hidden' name='secilenkullanici' value=".$row["kullaniciadi"].">";
        echo "<tr><td colspan='2'><input type='submit' value='sil'></td></tr>";
        echo "</form>";
    }
    echo "<table>";
   

    
}

?>


</body>
</html>