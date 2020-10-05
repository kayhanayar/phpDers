<?php
    require_once("./sabitler.php");
    require_once("./sablon/linkler.php");
?>

<?php
    Tablo::tabloBaslat("blueTable");
    
    Tablo::basliklariYaz("Kitap Adı","Yazar Adı","ISBN");
    $kullanici = Session::aktifKullaniciGetir();

    while(($siradakiKayit=  $kullanici->siradakiOkunmusKitabiGetir())!=null)
    {
        $siradakiKitap = Kitap::kitapAdiIleOlustur($siradakiKayit["kitapadi"]);

        Html::formBaslat("form_kitapiadeet.php","post");
            Tablo::satirBaslat();

                Tablo::satirYaz($siradakiKitap->kitapAdi,
                                $siradakiKitap->yazarAdi,
                                $siradakiKitap->isbn);

            Tablo::satirBitir();
        Html::formBitir();
        
    }

    Tablo::tabloBitir();
?>


<?php
    require_once("sablon/taban.php");
?>