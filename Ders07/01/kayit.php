
<?php
    require_once(__DIR__."/sabitler.php");

  
?>
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
</style>


<?php

require_once(SABLON_YOL."/linkler.php");
?>
<form action="formactions/form_kayit.php" method="POST">

    <label for="kullaniciAdi"><b>Kullanıcı Adi</b></label>
    <input type="text" placeholder="Kullanıcı Adı" name="kullaniciadi" required>
    <br/>
    <label for="adi"><b>Ad</b></label>
    <input type="text" placeholder="Ad" name="ad" required>
    <br/>
    <label for="soyadi"><b>Soyadı</b></label>
    <input type="text" placeholder="Soyad" name="soyadi" required>
    <br/>  
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Email" name="email" required>
    <br/>
    <label for="sifre"><b>Şifre</b></label>
    <input type="password" placeholder="Şifre" name="sifre" required>
    <br/>
    <input type="submit" value="kaydet">
</form>

<?php
require_once(SABLON_YOL."/taban.php");
?>