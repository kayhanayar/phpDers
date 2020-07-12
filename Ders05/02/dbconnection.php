<?php
    require_once("dbconfig.php");
    
    $db_server = mysqli_connect($db_hostname,$db_username,$db_password);
 
    if(!$db_server)
        echo "mysql'e bağlanamadı".mysqli_error($db_server);

    mysqli_select_db($db_server,$db_database);   

?>