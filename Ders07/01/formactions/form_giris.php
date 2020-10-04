<?php
    require_once("../sabitler.php");
    require_once "../kutuphane/autoload.php";

 
    $kullanici = Kullanici::girisIleOlstur($_POST);

    if($kullanici!=null )
    {
        Session::kullaniciAktifet($kullanici);

        header("Location:../index.php");
    }
    else
    {
       header("Location:../giris.php");
    }
?>