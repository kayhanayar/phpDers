<?php
    require_once("../sabitler.php");
    require_once "../kutuphane/autoload.php";

   

     if(Session::kullaniciAktifmi())
     {
        $kullanici = Session::aktifKullaniciGetir();
        $kullanici->kitapOduncAl($_POST['kitapadi']);
     
        $kitap = Kitap::kitapAdiIleOlustur($_POST['kitapadi']);
        $kitap->adetAzalt();
        $kitap->guncelle();
        
        Html::yonlendir("../kitapal.php");
      

     }
     else
     {
         echo "kullanici bilgileri mevcut";
     }

?>