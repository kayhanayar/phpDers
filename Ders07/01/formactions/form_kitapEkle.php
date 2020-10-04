<?php
    require_once("../sabitler.php");
    require_once "../kutuphane/autoload.php";

   

     if(Session::kullaniciAktifmi())
     {
        $kitap = Kitap::postile($_POST);
        $kitap->kaydet();
        header("Location:../index.php");

     }
     else
     {
         echo "kullanici bilgileri mevcut";
     }

?>
