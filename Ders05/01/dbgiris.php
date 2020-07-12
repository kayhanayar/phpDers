<?php
    require_once("dbconnection.php");
    require_once("dbfunctions.php");
    $kullaniciadi = $_POST["kullaniciadi"];
    $sifre = $_POST["sifre"];

    //Kullanıcı bilgileri kontrol ediliyor
    if(kullaniciGirisKontrol($db_server,$kullaniciadi,$sifre))
    {
        
        //kullanıcı bilgileri doğru. 2 tane kurabiye aktif ediliyor.
        //kurabiyeler 7 gün aktif kalacaktır.
        setcookie('kullaniciadi',$kullaniciadi,time()+60*60*24*7,'/');
        setcookie('sifre',$sifre,time()+60*60*24*7,'/');
        //index.php sayfasına yönlendirilme yapılıyor
        header("Location:./index.php");
    }
    else
    {
        header("Location:./giris.php");
    }


?>