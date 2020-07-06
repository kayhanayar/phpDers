<html>
<style>
form {
    padding: 16px;
    max-width:600px;
    margin:40px auto;
}
 input[type=text],[type=password]{
     width: 100%;
     padding: 12px 20px;
     border-radius: 8px;
     border: 2px solid red;
 }   

 input[type=submit],input[type=button] {
    background-color: red;
    border: none;
    color: white;
    padding: 16px 32px;
    margin-top: 10px;
 }
</style>
<script>
function kaydetSayfasinaGit() {
    location.href = "http://www.w3schools.com";
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