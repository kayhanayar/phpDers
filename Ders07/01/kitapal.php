<?php
    require_once("./sabitler.php");
    require_once("./sablon/linkler.php");
?>

<?php
    Tablo::tabloBaslat("blueTable");
    
    Tablo::basliklariYaz("Kitap Adı","Yazar Adı","ISBN","adet","İşlem");
    $kullanici = Session::aktifKullaniciGetir();
    while(($siradaki= Kitap::siradakiniGetir())!=null)
    {
       
        Html::formBaslat("form_kitapOduncAl.php","post");
            Tablo::satirBaslat();

                Tablo::satirYaz($siradaki->kitapAdi,
                                $siradaki->yazarAdi,
                                $siradaki->isbn,
                                $siradaki->adet);
                
                Tablo::sutunBaslat();
                
                if($kullanici->kitapUstundemi($siradaki))
                {
                    Html::mesajEkle("Kitap Üzerinizde");
                }
                else{
                    Html::gizliYazi("kitapadi",$siradaki->kitapAdi);
                    Html::submit("Ödünç Al");
                }                               
                

                Tablo::sutunBitir();
            
            Tablo::satirBitir();
        Html::formBitir();
    }

    Tablo::tabloBitir();
?>


<?php
    require_once("sablon/taban.php");
?>