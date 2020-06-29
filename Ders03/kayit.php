<html>
<style>
.form {
    padding: 16px;

}
 input[type=text]{
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
<body>
<h1> Kayıt Sayfası</h1>
<form>
<label for="email">Email</label>
<input type="text" placeholder="Email" name="email" required>
<br/>
<label for="kullaniciAdi"><b>Kullanıcı Adi</b></label>
<input type="text" placeholder="Kullanıcı Adı" name="kullaniciAdi" required>
<br/>
<label for="adi"><b>Ad</b></label>
<input type="text" placeholder="Ad" name="ad" required>
<br/>
<label for="soyadi"><b>Soyadı</b></label>
<input type="text" placeholder="Soyad" name="soyadi" required>

<input type="submit" value="kaydet">
</form>

</body>

</html>