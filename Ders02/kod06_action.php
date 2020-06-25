<?php
    if(isset($_POST["kullaniciAdi"]))
    {
        $kullaniciAdi = $_POST["kullaniciAdi"];
        //strtolower kullanılarak bütün karakterler küçük yapılabilir.
        $sayfaNumarasi = 1;
        if($kullaniciAdi=="Kayhan")
        {
            $sayfaNumarasi = 123;
        }else if($kullaniciAdi=="Mustafa")
        {
            $sayfaNumarasi = 456;
        }
        echo "<a href=\"./liste$sayfaNumarasi.php\">yeni sayfa</a>";
    }
    else
    {
        header("Location:./kod06.php");
    }

?>