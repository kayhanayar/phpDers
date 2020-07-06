<?php
    require_once("db.php");
    if(!kullanciGetir($db_server,$_POST['kullaniciadi']))
    {
        kullaniciKaydet($db_server,$_POST);
    }
    else
    {
        echo "kullanici bilgileri mevcut";
    }
    
?>