<?php

    require_once("dbconnection.php");
    require_once("dbfunctions.php");
  
    if(postAktifMi())
    {
       kullaniciDektiviteEt();
    
    }
   
    yetkiliKullaniciKontrol($db_server);
?>
<form method="POST">
    <input type="submit" value="Çıkış">
</form>

