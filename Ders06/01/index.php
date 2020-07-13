
<?php
    
    require_once("./sabitler.php");
    require_once(DB_YOL."/dbconnection.php");
    require_once(DB_YOL."/dbfunctions.php");
    
    if(postAktifMi())
    {
       kullaniciDektiviteEt();
    }
   
    yetkiliKullaniciKontrol($db_server);
?>
<h1>Ana Sayfa</h1>
<link rel="stylesheet" href="./css/main.css">
<a href="derskaydet.php">Yeni Ders Kayıt</a>
<a href="derslistesi.php">Ders Listele</a>
<a href="derssec.php">Ders Seç</a>
<a href="secilidersler.php">Seçilen Dersler</a>

<form method="POST">

<br/><br/>
    <input type="submit" value="Çıkış">
</form>


