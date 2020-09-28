<?php

class Html{

    public static function link($adres,$yazi){
        echo  "<a href='$adres'>$yazi</a>";
    }
    public static function cssEkle($adres){
       echo "<link rel='stylesheet' href='./css/$adres'>";
    }

}

?>