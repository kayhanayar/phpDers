<?php
    require_once("./sabitler.php");
    require_once("./sablon/linkler.php");
?>

<?php
    Tablo::tabloBaslat("blueTable");
    
    Tablo::basliklariYaz("Kitap Adı","Yazar Adı","ISBN","İşlem");
    $kullanici = Session::aktifKullaniciGetir();

    while(($siradakiKayit=  $kullanici->siradakiKitabiGetir())!=null)
    {
        $siradakiKitap = Kitap::kitapAdiIleOlustur($siradakiKayit["kitapadi"]);

        Html::formBaslat("form_kitapiadeet.php","post");
            Tablo::satirBaslat();

                Tablo::satirYaz($siradakiKitap->kitapAdi,
                                $siradakiKitap->yazarAdi,
                                $siradakiKitap->isbn);

                Tablo::sutunBaslat();
                    Html::gizliYazi("kitapadi",$siradakiKitap->kitapAdi);
                    Html::submit("İadet Et");
                Tablo::sutunBitir();
            
            Tablo::satirBitir();
        Html::formBitir();
        
    }

    Tablo::tabloBitir();
?>


<?php
    require_once("sablon/taban.php");
?>