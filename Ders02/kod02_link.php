<html>
<body>
<meta charset="UTF-8">


<h1>
<?php
    echo $_GET["isim"];

    //linkte birden fazla değişken atanırken araya & işareti konulmaktadır
    //aslında bu işlem için &amp; yazmak gerekir.
    //fakat & simgeside kullansak tarayıcı bizim için düzeltecektir.
?>
</h1>

<a href="./kod02.php?kullanici=Merhaba&amp;deneme=kimler">ana sayfa</a>

</body>
</html>