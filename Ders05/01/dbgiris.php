<?php
    require_once("db.php");
    $kullaniciadi = $_POST["kullaniciadi"];
    $sifre = $_POST["sifre"];

    if(kullaniciGirisKontrol($db_server,$kullaniciadi,$sifre))
    {
        
        setcookie('kullaniciadi',$kullaniciadi,time()+60*60*24*7,'/');
        setcookie('sifre',$sifre,time()+60*60*24*7,'/');
        header("Location:./index.php");
    }
    else
    {
        //("Location:./giris.php");
    }


?>