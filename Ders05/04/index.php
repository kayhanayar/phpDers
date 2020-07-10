
<?php

    require_once("db.php");
  
    if(postAktifMi())
    {
       kullaniciDektiviteEt();
    }
   
    yetkiliKullaniciKontrol($db_server);
?>
<h1>Ana Sayfa</h1>
<link rel="stylesheet" href="./css/main.css">

<form method="POST">
<a href="derskaydet.php">Yeni Ders Kayıt</a>
<a href="derslistesi.php">Ders Listele</a>
<a href="derssec.php">Ders Seç</a>
    <input type="submit" value="Çıkış">
</form>


