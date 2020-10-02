<?php

class Html{

    public static function link($adres,$yazi){
        echo  "<a href='$adres'>$yazi</a>";
    }
    public static function cssEkle($adres){
       echo "<link rel='stylesheet' href='./css/$adres'>";
    }
    public static function formBaslat($sayfa,$yontem){
        echo "<form action='formactions/$sayfa' method='$yontem'>";
    }
    public static function formBitir(){
        echo "</form>";
    }
    public static function divBaslat($css){
        echo "<div class='container'>";
    }
    public static function divBitir(){
        echo "</div>";
    }
    public static function yaziAlani($isim,$baslik){
        echo "<label for='$isim'><b>$baslik</b></label>";
        echo "<input type='text' placeholder='$baslik Gir' name='kitapadi'>";
    }
    public static function submit($baslik){
        echo "<button type='submit'>$baslik</button>";
    }
}

?>