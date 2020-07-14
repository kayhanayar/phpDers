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

            for($sayac=0;$sayac<count($dersler);$sayac++){
                seciliDersSil($db_server,$_SESSION["kullaniciadi"],$dersler[$sayac]);
            }
            
            header("location:../index.php");
        }
        
    }
?>