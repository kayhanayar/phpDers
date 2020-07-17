<?php
    require_once(DB_YOL."/dbconnection.php");
    require_once(DB_YOL."/dbfunctions.php");
    yetkiliKullaniciKontrol($db_server);

?>
<html>
    <link rel="stylesheet" href="./css/main.css">
<body>
 
<ul>
  <li><a href="derskaydet.php">Yeni Ders Kayıt</a></li>
  <li><a href="derslistesi.php">Ders Listele</a></li>
  <li><a href="derssec.php">Ders Seç</a></li>
  <li><a href="secilidersler.php">Seçilen Dersler</a></li>
  <li class="cikis" ><a class="cikis" href="./formactions/dbcikis.php">Çıkış</a></li>
</ul>

