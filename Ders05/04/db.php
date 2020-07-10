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
    function kullaniciAktifEt($kullaniciadi,$sifre){
        session_start();
        $_SESSION["kullaniciadi"]= $kullaniciadi;
        $_SESSION["sifre"] = $sifre;
    }
    function kullaniciDektiviteEt(){
        session_start();
        session_destroy();
        header("location:./giris.php");
    }
    function yetkiliKullaniciKontrol($db_server){

        session_start();
        $kullaniciadi  = $_SESSION['kullaniciadi'];
        $sifre = $_SESSION['sifre'];
        
        if(!kullaniciGirisKontrol($db_server,$kullaniciadi,$sifre))
        {
            header("location:./giris.php");
        }
        else
        {
           
        }
    }

    function postAktifMi(){
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    function dersKaydet($server,$dersbilgileri){
        $dersadi   = $_POST['dersadi'];
        $donem     = $_POST['donem'];
        $kredi     = $_POST['kredi'];
        
        $query = "INSERT INTO tabloders(dersadi, donem, kredi) VALUES ('$dersadi', '$donem','$kredi')";
        
        $result = mysqli_query($server,$query);

        if($result)
        {
            header("location:./derskaydet.php");
            return $result;
        }      
        else{
            echo "Kayıt hatası yapıldı :".mysqli_error($server);
            return null;
        }           
    }
    function dersleriGetir($server){
        $query = "SELECT * FROM tabloders";

        $result = mysqli_query($server,$query);

        if($result->num_rows>0){
            return $result;
        }
        else
        {
            return null;
        }       
    }
    function siradakiDers($dersler){
        return $dersler->fetch_assoc();
    }
?>