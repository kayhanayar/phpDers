<?php
    if(isset($_POST))
    {
        $texBoxSayisi = $_POST["boxSayisi"];

        for($sayac=0;$sayac<$texBoxSayisi;$sayac++)
        {
            echo "<label for=\"boxYazi$sayac\"> Yazi$sayac:</label>";
            echo "<input type=\"text\" name=\"boxYazi$sayac\" id=\"boxSayisi\">";
            echo "<br/>";
        }
    }

?>