<html>

<link rel="stylesheet" href="./css/main.css">
<script>
function kaydetSayfasinaGit() {
    location.href = "./kayit.php";
}
</script>
<body>
<form action="dbGiris.php" method="POST">

    <label for="kullaniciAdi"><b>Kullanıcı Adi</b></label>
    <input type="text" placeholder="Kullanıcı Adı" name="kullaniciadi" required>
    <br/>
    <label for="sifre"><b>Şifre</b></label>
    <input type="password" placeholder="Şifre" name="sifre" required>
    <br/>
    <input type="button" onclick="kaydetSayfasinaGit()" value="Kayıt Ol">
    <input type="submit" value="Giriş">
</form>
</body>
</html>
<?php


?>