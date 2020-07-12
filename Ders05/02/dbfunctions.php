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
?>