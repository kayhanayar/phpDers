<html>
<head>
  

<?php
    if(isset($_POST["kullaniciAdi"]))
    {
        $kullaniciAdi = $_POST["kullaniciAdi"];
        //strtolower kullanılarak bütün karakterler küçük yapılabilir.
        $cssSayfasi = 1;
        if($kullaniciAdi=="Kayhan")
        {
            $cssSayfasi = "ilkKullanici";
        }else if($kullaniciAdi=="Mustafa")
        {
            $cssSayfasi = "ikinciKullanici";
        }
        echo "<link rel=\"stylesheet\" href=\"$cssSayfasi.css\">";
    }
    else
    {
        header("Location:./kod06.php");
    }

?>
</head>
<body>
    <p class="kural">Merhaba</p>
</body>
</html>