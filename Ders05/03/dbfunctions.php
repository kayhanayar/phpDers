<?php
    //veri tabanında kullanıcı bilgilerini barındıran satırı getirir
    //ilk parametresi veritabanı bağlantısı
    //ikinci parametresi kullanici adi
    function kullanciGetir($server,$kullaniciadi){

        $query = "SELECT * FROM tablokullanicilar WHERE kullaniciadi='$kullaniciadi';";

        $result = mysqli_query($server,$query);

        if($result->num_rows>0){
            return $result->fetch_assoc();
        }
        else
        {
            return null;
        }
    }

    //veritabaınındaki istenilen kullanıcının bilgilerini günceller.
    //son parametreye formdan gelen POST dizisi verilebilir
    //veya kullanıcı bilgilerini barındıran bir dizi verilebilir.
    function kullaniciGuncelle($server,$kullaniciAdi,$kullaniciBilgileri){

        $yeniKullaniciAdi = $kullaniciBilgileri['kullaniciadi'];
        $yeniad = $kullaniciBilgileri['ad'];
        $yenisoyad = $kullaniciBilgileri['soyad'];
        $yeniemail = $kullaniciBilgileri['email'];
        
        $query = "UPDATE kullanicilar SET kullaniciadi='$yeniKullaniciAdi', adi='$yeniad', soyadi='$yenisoyad', email='$yeniemail' WHERE kullaniciadi='$kullaniciAdi';";
        $result = mysqli_query($server,$query);
        
        return $result;
    }

    //fonksiyon kendisine verilen kullanıcı bilgilerini veri tabanına kaydeder.
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
    //Fonksiyon kendisine verilen kullanicinin veri tabanında olup olmadığını 
    // kontrol eder. eğer kullanıcıyı bulamazsa false dönecektir.
    //eğer kullanıcıyı bulursa bu sefer veritabanındaki şifre ile fonksiyona verilen şifre
    //karşılaştırılmaktadır. eşleşme varsa true döner aksi halde false döner.
    function kullaniciGirisKontrol($server,$kullaniciadi,$sifre){

        $result = kullanciGetir($server,$kullaniciadi);

        if($result)
        {
            if($result['sifre']==$sifre)
            {
                return true;
            }
        }
        return false;
    }
    //Bu fonksiyon Kullanici bilgilerine göre session günceller.
    function kullaniciAktifEt($kullaniciadi,$sifre){
        session_start();
        $_SESSION["kullaniciadi"]= $kullaniciadi;
        $_SESSION["sifre"] = $sifre;
    }
    //Fonksiyon bütün session bilgilerini yok eder. ve giriş sayfasına yönlendirme yapar
    //
    function kullaniciDektiviteEt(){
        session_start();
        session_destroy();
        header("location:./giris.php");
    }
    //sitedeki her sayfada öncelikle bu fonksiyon çağrılacaktır.
    //fonksiyon session içerisindeki kullanıcı bilgilerini kontrol eder.
    //eğer kullanıcı bilgileri doğru ise herhangi bir işlem yapılmaz.
    //kullanıcı bilgileri doğru ise kullanıcı giriş sayfasına yönlendirilir.
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
    //çağrılan sayfaya POST ile gelinip gelinmediğini kontrol eder.
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
?>