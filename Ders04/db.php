<?php
    require_once("config.php");
    
    $db_server = mysqli_connect($db_hostname,$db_username,$db_password);
 
    if(!$db_server)
        echo "mysql'e bağlanamadı".mysqli_error($db_server);

    mysqli_select_db($db_server,$db_database);   

    function kullanciGetir($server,$kullaniciId){

        $query = "SELECT * FROM kullanicilar WHERE kullaniciadi='$kullaniciId';";

        $result = mysqli_query($server,$query);

        if($result->num_rows>0){
            return $result->fetch_assoc();
        }
        else
        {
            return null;
        }
    }
?>