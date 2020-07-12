<?php
    require_once("dbconnection.php");
    require_once("dbfunctions.php");
  
    if(postAktifMi())
    {
       
        dersKaydet($db_server,$_POST);

    }
   
    yetkiliKullaniciKontrol($db_server);

?>