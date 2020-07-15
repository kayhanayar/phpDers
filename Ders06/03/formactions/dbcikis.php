<?php
    
    require_once("../sabitler.php");
    require_once(DB_YOL."/dbconnection.php");
    require_once(DB_YOL."/dbfunctions.php");
    
    if(postAktifMi())
    {
       kullaniciDektiviteEt();

       header("location:../giris.php");
    }
   
    
?>