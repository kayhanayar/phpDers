<?php

    
    require_once "./kutuphane/autoload.php";

    $kullanici = Kullanici::aktifKullaniciGetir();
    if(!$kullanici)
      header("Location:../giris.php");

?>
<html>
    <link rel="stylesheet" href="./css/main.css">
<body>
<div class="topnav" id="myTopnav">
  <a href="index.php" class="active">Ana Sayfa</a>
  <a href="guncelle.php">Bilgiler</a>
  <a href="uzerimdekiler.php">Kitaplar</a>
  <a href="kitapal.php">Kitap Al</a>
  <a href="formactions/form_cikis.php">Çıkış</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

