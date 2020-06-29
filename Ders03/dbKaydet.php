<?php

$db_hostname = "localhost";
$db_database = "dbsite";
$db_username ="kayhan";
$db_password ="123";

$kullaniciAdi   = $_POST['kullaniciAdi'];
$adi            = $_POST['ad'];
$soyadi         = $_POST['soyadi'];
$email          = $_POST['email'];

$db_server = mysqli_connect($db_hostname,$db_username,$db_password);

if(!$db_server)
    echo "mysql'e bağlanamadı".mysqli_error($db_server);

mysqli_select_db($db_server,$db_database);

$query = "INSERT INTO kullanicilar(kullaniciadi, adi, soyadi, email) VALUES ('$kullaniciAdi', '$adi','$soyadi','$email')";

$result = mysqli_query($db_server,$query);

if($result)
{
    echo "Kayit başarı ile yapıldı";
}

mysqli_close($db_server);

?>