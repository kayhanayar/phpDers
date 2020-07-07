<?php
    require_once("config.php");
    
    $db_server = mysqli_connect($db_hostname,$db_username,$db_password);
 
    if(!$db_server)
        echo "mysql'e bağlanamadı".mysqli_error($db_server);

    mysqli_select_db($db_server,$db_database);   

    function kullanciGetir($server,$kullaniciId){

        $query = "SELECT * FROM tablokullanicilar WHERE kullaniciadi='$kullaniciId';";

        $result = mysqli_query($server,$query);

        if($result->num_rows>0){
            return $result->fetch_assoc();
        }
        else
        {
            return null;
        }
    }

    function kullaniciGuncelle($server,$kullaniciAdi,$kullaniciBilgileri){

        $yeniKullaniciAdi = $kullaniciBilgileri['kullaniciadi'];
        $yeniad = $kullaniciBilgileri['ad'];
        $yenisoyad = $kullaniciBilgileri['soyad'];
        $yeniemail = $kullaniciBilgileri['email'];
        
        $query = "UPDATE kullanicilar SET kullaniciadi='$yeniKullaniciAdi', adi='$yeniad', soyadi='$yenisoyad', email='$yeniemail' WHERE kullaniciadi='$kullaniciAdi';";
        $result = mysqli_query($server,$query);
        
        return $result;
    }
    function kullaniciKaydet($server,$kullaniciBilgileri){
        $kullaniciadi   = $_POST['kullaniciadi'];
        $adi            = $_POST['ad'];
        $soyadi         = $_POST['soyadi'];
        $email          = $_POST['email'];
        $sifre          = $_POST['sifre'];
        
        $query = "INSERT INTO tablokullanicilar(kullaniciadi, ad, soyad, email,sifre) VALUES ('$kullaniciadi', '$adi','$soyadi','$email','$sifre')";
        
        $result = mysqli_query($server,$query);

        if($result)
        {
            echo "Kayit başarı ile yapıldı";
            return $result;
        }      
        else{
            echo "Kayıt hatası yapıldı :".mysqli_error($server);
            return null;
        }   
    }
    function kullaniciGirisKontrol($server,$kullaniciadi,$sifre){

        $result = kullanciGetir($server,$kullaniciadi);

        if($result)
        {
            if($result['sifre']==$sifre)
            {
                return true;
            }
        }
        else
        {
            return false;
        }
    }
?>