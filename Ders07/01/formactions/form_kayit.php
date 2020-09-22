<?php
     require_once "../kutuphane/autoload.php";

   

    if(!$db->kullanciGetir($_POST['kullaniciadi']) )
    {

    }
    else
    {
        echo "kullanici bilgileri mevcut";
    }

?>