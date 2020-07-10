<?php
    require_once("db.php");
  
    if(postAktifMi())
    {
       
        dersKaydet($db_server,$_POST);

    }
   
    yetkiliKullaniciKontrol($db_server);

?>