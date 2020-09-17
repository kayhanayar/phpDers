<?php

require_once("dbconfig.php");


class DB{
    public $db_server;
    function __construct()
    {
        $this->baglan(new DBconfig());
    }
    function __destruct()
    {
        mysqli_close($this->db_server);

    }
    function baglan(DBconfig $dbconfig){
     

        $this->db_server = mysqli_connect($dbconfig->db_hostname,
                                            $dbconfig->db_username,
                                            $dbconfig->db_password);
 
        if(!$this->db_server)
            echo "mysql'e bağlanamadı".mysqli_error($this->db_server);
        else
            echo "bağlandı";
        mysqli_select_db($this->db_server,$dbconfig->db_database);   
    
    }
    function kullanciGetir($kullaniciadi){

        $query = "SELECT * FROM tablokullanicilar WHERE kullaniciadi='$kullaniciadi';";

        $result = mysqli_query($this->db_server,$query);

        if($result->num_rows>0){
            return $result->fetch_assoc();
        }
        else
        {
            return null;
        }
    }
    function kullaniciKaydet($kullaniciBilgileri){
        
        $kullaniciadi   = $_POST['kullaniciadi'];
        $adi            = $_POST['ad'];
        $soyadi         = $_POST['soyadi'];
        $email          = $_POST['email'];
        $sifre          = $_POST['sifre'];
        
        $query = "INSERT INTO tablokullanicilar(kullaniciadi, ad, soyad, email,sifre) VALUES ('$kullaniciadi', '$adi','$soyadi','$email','$sifre')";
        
        $result = mysqli_query($this->db_server,$query);

        if($result)
        {
            echo "Kayit başarı ile yapıldı";
            return $result;
        }      
        else{
            echo "Kayıt hatası yapıldı :".mysqli_error($this->db_server);
            return null;
        }   
    }
}
   
?>