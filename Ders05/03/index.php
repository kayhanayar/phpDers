<?php

    require_once("db.php");
  
    if(postAktifMi())
    {
       kullaniciDektiviteEt();
    }
   
    yetkiliKullaniciKontrol($db_server);
?>
<form method="POST">
    <input type="submit" value="Çıkış">
</form>

