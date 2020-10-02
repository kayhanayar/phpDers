
<?php
    require_once("./sabitler.php");
    require_once("./sablon/linkler.php");
    Html::cssEkle("baglan.css");
?>

<h1>Yeni Kitap Ekle</h1>
<?php

Html::formBaslat("form_kitapKaydet.php","post");
  Html::divBaslat("container");
    Html::yaziAlani("kitapadi","Kitap Adı");
    Html::yaziAlani("yazaradi","Yazar adı");
    Html::yaziAlani("isbn","ISBN");
    Html::submit("Kaydet");
  Html::divBitir();
Html::formBitir();

?>
<?php
    require_once("sablon/taban.php");
?>