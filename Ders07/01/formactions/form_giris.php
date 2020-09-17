<?php
    require_once("../sabitler.php");

    $db = new DB();

    if($db->kullanciGetir($_POST['kullaniciadi']) )
    {
        $kullanici = new Kullanici($_POST['kullaniciadi'],$_POST['sifre']);
        $kullanici->aktifEt();
    }
?>