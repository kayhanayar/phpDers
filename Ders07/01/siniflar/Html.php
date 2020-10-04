<?php
//https://divtable.com/table-styler/
class Html{

    public static function link($adres,$yazi){
        echo  "<a href='$adres'>$yazi</a>";
    }
    public static function cssEkle($adres){
       echo "<link rel='stylesheet' href='./css/$adres'>";
    }
    public static function formBaslat($sayfa,$yontem){
        echo "<form action='formactions/$sayfa' method='$yontem'>\n";
    }
    public static function formBitir(){
        echo "</form>\n";
    }
    public static function divBaslat($css){
        echo "<div class='container'>\n";
    }
    public static function divBitir(){
        echo "</div>\n";
    }
    public static function yaziAlani($isim,$baslik){
        echo "<label for='$isim'><b>$baslik</b></label>\n";
        echo "<input type='text' placeholder='$baslik Gir' name='$isim'>\n";
    }
    public static function mesajEkle($yazi){
        echo "<label '><b>$yazi</b></label>\n";
    }
    public static function submit($baslik){
        echo "<button type='submit'>$baslik</button>\n";
    }
    public static function gizliYazi($isim,$deger){
        echo "<input type='hidden' name='$isim' value='$deger'> \n";
    }
    public static function yonlendir($adres){
        header("Location:$adres");
    }

}
class Tablo
{
    public static function tabloBaslat($css){
        echo "<table class='$css'>\n";
    }
    public static function tabloBitir(){
        echo "</table>\n";
    }
    public static function basliklariYaz(...$basliklar){
        echo "<thead>\n";
        echo "<tr>\n";
        foreach($basliklar as $siradaki){
            echo "<th>";
            echo $siradaki;
            echo "</th>\n";
        }
        echo "</tr>\n";
        echo "</thead>\n";
    }
    public static function satirBaslat(){
        echo "<tr>\n";   
    }
    public static function satirBitir(){
        echo "</tr>\n"; 
    }
    public static function sutunBaslat(){
        echo "<td>";   
    }
    public static function sutunBitir(){
        echo "</td>\n"; 
    }
    public static function satirYaz(...$satir){
       
        foreach($satir as $siradaki){
            echo "<td>";
            echo $siradaki;
            echo "</td>";
        }
        
              
    }
}
?>