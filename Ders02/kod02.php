<html>
<body>
<meta charset="UTF-8">


<h1>kod02</h1>
<?php
    if(array_key_exists("kullanici",$_GET))
    {
        echo $_GET["kullanici"]."<br/>";
    }
    if(array_key_exists("deneme",$_GET))
    {
        echo $_GET["deneme"]."<br/>";
    }    
    //htmlspecialchars fonksiyonu kullanıcının html kodu injekte etmesini engelleyebilir
    
    
?>

<a href="./kod02_link.php?isim=kayhanÜ">yenİ sayfa</a>

</body>
</html>