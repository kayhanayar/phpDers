<?php
    require_once("dbconnection.php");
    require_once("dbfunctions.php");

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