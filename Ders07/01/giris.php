<?php
    require_once(__DIR__."/sabitler.php");

  
?>
<link rel="stylesheet" href="./css/baglan.css">

<script>
function kayitol() {
    location.href = "./kayit.php";
}
</script>


<?php

require_once(SABLON_YOL."/linkler.php");
?>

<h1>Bağlanma Formu</h1>


<form action="formactions/form_giris.php" method="post">
  <div class="container">
    <label for="kullaniciadi"><b>Kullanici Adi</b></label>
    <input type="text" placeholder="Kullanici Adi Gir" name="kullaniciadi" required>

    <label for="sifre"><b>Şifre</b></label>
    <input type="password" placeholder="Şifre Gir" name="sifre" required>
    <button type="submit">Giris</button>
    <button type="button" onclick="kayitol()">Kayit Ol</button>
   
   

  </div>

</form>

<?php
require_once(SABLON_YOL."/taban.php");
?>