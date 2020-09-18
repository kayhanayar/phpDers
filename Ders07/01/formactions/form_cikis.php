<?php
    require_once("../sabitler.php");
    require_once KUTUPHANE."/autoload.php";
    $kullanici = Kullanici::aktifKullaniciGetir();
    $kullanici->kullaniciDektiviteEt();
    header("Location:../giris.php");
?>
