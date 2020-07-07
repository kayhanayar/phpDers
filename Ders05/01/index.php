<?php

    require_once("db.php");
    
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        echo "Merhaba";
        setcookie('kullaniciadi',"",0,'/');
        setcookie('sifre',"",0,'/');
        header("location:./giris.php");
    }
    $kullaniciadi  = $_COOKIE['kullaniciadi'];
    $sifre = $_COOKIE['sifre'];
    
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

