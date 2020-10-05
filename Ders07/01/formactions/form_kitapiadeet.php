<?php
    require_once("../sabitler.php");
    require_once "../kutuphane/autoload.php";

   

     if(Session::kullaniciAktifmi())
     {
        $kullanici = Session::aktifKullaniciGetir();
        $kullanici->okunmusEkle($_POST['kitapadi']);
        $kullanici->kitapiadeEt($_POST['kitapadi']);
        
        $kitap = Kitap::kitapAdiIleOlustur($_POST['kitapadi']);
        $kitap->adetArttir();
        $kitap->guncelle();
        
        Html::yonlendir("../uzerimdekiler.php");
      

     }
     else
     {
         echo "kullanici bilgileri mevcut";
     }

?>