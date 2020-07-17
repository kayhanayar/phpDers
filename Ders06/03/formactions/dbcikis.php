<?php
    
    require_once("../sabitler.php");
    require_once(DB_YOL."/dbconnection.php");
    require_once(DB_YOL."/dbfunctions.php");
    
    kullaniciDektiviteEt();

    header("location:../giris.php");
    
    
?>