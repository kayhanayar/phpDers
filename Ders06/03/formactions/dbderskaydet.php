<?php
    require_once("../sabitler.php");
    require_once(DB_YOL."/dbconnection.php");
    require_once(DB_YOL."/dbfunctions.php");
  
    if(postAktifMi())
    {
       
        dersKaydet($db_server,$_POST);
        header("Location:../derskaydet.php");
    }
   
    yetkiliKullaniciKontrol($db_server);

?>