<?php
    require_once("../sabitler.php");
    require_once "../kutuphane/autoload.php";

    $db = new DB();

    if($db->kullaniciGirisKontrol($_POST['kullaniciadi'],$_POST['sifre']) )
    {
        $kullanici = Kullanici::girisIleOlstur($_POST);

        Session::kullaniciAktifet($kullanici);

        header("Location:../index.php");
    }
    else
    {
        header("Location:../giris.php");
    }
?>