<?php
    require_once("../sabitler.php");
    require_once(DB_YOL."/dbconnection.php");
    require_once(DB_YOL."/dbfunctions.php");

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