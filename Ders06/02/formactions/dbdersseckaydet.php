<?php
    require_once("../sabitler.php");
    require_once(DB_YOL."/dbconnection.php");
    require_once(DB_YOL."/dbfunctions.php");
    
    
    if(postAktifMi())
    {
        if(isset($_POST['dersler']))
        {
            session_start();
            $dersler = $_POST['dersler'];

            secilidersleriKaydet($db_server,$_SESSION["kullaniciadi"],$dersler);
            header("location:../index.php");
        }
        
    }
?>