<?php
    require_once("dbconnection.php");
    require_once("dbfunctions.php");
    $kullaniciadi = $_POST["kullaniciadi"];
    $sifre = $_POST["sifre"];
   
    if(kullaniciGirisKontrol($db_server,$kullaniciadi,$sifre))
    {
        
        session_start();
        $_SESSION["kullaniciadi"]= $kullaniciadi;
       
        $_SESSION["sifre"] = $sifre;
       
        header("Location:./index.php");
    }
    else
    {
        //("Location:./giris.php");
    }


?>