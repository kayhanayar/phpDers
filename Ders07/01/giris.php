<?php
    require_once(__DIR__."/sabitler.php");

  
?>
<html>
 
<link rel="stylesheet" href="./css/baglan.css">

<script>
function kayitol() {
    location.href = "./kayit.php";
   
}
</script>

<body>
<h1>Bağlanma Formu</h1>


<form action="formactions/form_giris.php" method="post">
  <div class="container">
    <label for="kullaniciadi"><b>Kullanici Adi</b></label>
    <input type="text" placeholder="Kullanici Adi Gir" name="kullaniciadi">

    <label for="sifre"><b>Şifre</b></label>
    <input type="password" placeholder="Şifre Gir" name="sifre">
    <button type="button" onclick="kayitol()">Kayit Ol</button>
    <button type="submit">Giris</button>

  </div>

</form>
</body>
</html>