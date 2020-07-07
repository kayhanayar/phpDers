<?php

    require_once("db.php");
    
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        
        session_destroy();
        header("location:./giris.php");
    }
    session_start();
    $kullaniciadi  = $_SESSION['kullaniciadi'];
    $sifre = $_SESSION['sifre'];
    
    if(!kullaniciGirisKontrol($db_server,$kullaniciadi,$sifre))
    {
        header("location:./giris.php");
    }
    else
    {
        echo $kullaniciadi." ".$sifre;
    }
?>
<form method="POST">
    <input type="submit" value="Çıkış">
</form>

