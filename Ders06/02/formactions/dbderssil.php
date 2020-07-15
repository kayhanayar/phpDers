<?php
    require_once("../sabitler.php");
    require_once(DB_YOL."/dbconnection.php");
    require_once(DB_YOL."/dbfunctions.php");
    
    
    
    if(postAktifMi())
    {
        if(isset($_POST['dersler']))
        {
            $dizi = $_POST['dersler'];
           
            for($i = 0;$i<count($dizi);$i++)
            {
                dersSil($db_server,$dizi[$i]);
            }
        }
        header("location:../derslistesi.php");
    }
?>