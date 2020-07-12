<?php
    require_once("dbconnection.php");
    require_once("dbfunctions.php");

    
    $kullaniciadi = $_POST["kullaniciadi"];
    $sifre = $_POST["sifre"];
   
    if(kullaniciGirisKontrol($db_server,$kullaniciadi,$sifre))
    {
        kullaniciAktifEt($kullaniciadi,$sifre);
        header("Location:./index.php");
    }
    else
    {
        //("Location:./giris.php");
    }


?>