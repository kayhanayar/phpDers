<?php
    require_once("../sabitler.php");
    require_once "../kutuphane/autoload.php";

    $db = new DB();

    if($db->kullaniciGirisKontrol($_POST['kullaniciadi'],$_POST['sifre']) )
    {
        $kullanici = new Kullanici($_POST['kullaniciadi'],$_POST['sifre']);
        $kullanici->aktifEt();
        header("Location:../index.php");
    }
?>