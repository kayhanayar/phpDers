
<?php
    require_once("./sabitler.php");
    require_once("./sablon/linkler.php");
    Html::cssEkle("baglan.css");
?>

<h1>Yeni Kitap Ekle</h1>
<form action="formactions/form_kitapKaydet.php" method="post">
  <div class="container">
    <label for="kitapadi"><b>Kitap Adı</b></label>
    <input type="text" placeholder="Kitap Adı Gir" name="kitapadi">

    <label for="yazaradi"><b>Yazar adı</b></label>
    <input type="password" placeholder="Yazar adı gir" name="yazaradi">
    
    <label for="isbn"><b>ISBN</b></label>
    <input type="password" placeholder="ISBN Gir" name="isbn">   
    <button type="submit">Kaydet</button>

  </div>

</form>

<?php
    require_once("sablon/taban.php");
?>