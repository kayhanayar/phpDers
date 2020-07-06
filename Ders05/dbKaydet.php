<?php
    require_once("db.php");

    if(!kullanciGetir($db_server,$_POST['kullaniciadi']))
    {
        $result = kullaniciKaydet($db_server,$_POST);

        if($result)
        {
            header("location:./giris.php");
        }
    }
    else
    {
        echo "kullanici bilgileri mevcut";
    }
    
?>