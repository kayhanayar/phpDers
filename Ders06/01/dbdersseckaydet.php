<?php
    require_once("dbconnection.php");
    require_once("dbfunctions.php");
    
    
    if(postAktifMi())
    {
        if(isset($_POST['dersler']))
        {
            session_start();
            $dersler = $_POST['dersler'];

            secilidersleriKaydet($db_server,$_SESSION["kullaniciadi"],$dersler);
            header("location:./index.php");
        }
        
    }
?>