<?php
    require_once("../sabitler.php");

    $db = new DB();

    if(!$db->kullanciGetir($_POST['kullaniciadi']) )
    {
        //$result = kullaniciKaydet($db_server,$_POST);

        //if($result)
        {
           // header("location:./giris.php");
        }
    }
    else
    {
        echo "kullanici bilgileri mevcut";
    }

?>