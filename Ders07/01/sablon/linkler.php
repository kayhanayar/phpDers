<?php

    
    require_once "./kutuphane/autoload.php";

    $kullanici = Session::aktifKullaniciGetir();

    if(!$kullanici)
      header("Location:./giris.php");

?>
<html>
    <link rel="stylesheet" href="./css/main.css">
<body>
<div class="topnav" id="myTopnav">
  <a href="index.php" class="active">Ana Sayfa</a>
  <?php 
    if($kullanici->adminMi()==true)
    {
      Html::link("kullanicilar.php","Kullanıcılar");
      Html::link("kitapekle.php","Kitap Ekle");
    }
    else
    {
      Html::link("guncelle.php","Bilgiler");
    }
  
    Html::link("uzerimdekiler.php","Üzerimdeki Kitaplar");
    Html::link("okunmuslar.php","Okuduğum Kitaplar");
    Html::link("kitapal.php","Kitap Al");
    Html::link("formactions/form_cikis.php","Çıkış");

  ?>
  
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>


