<?php

class Kullanici
{
    public $kullaniciadi;
    public $ad;
    public $soyad;
    public $email;
    public $sifre;
    public $yetki;
    public $siradakiOduncKitap=null;
    public function __construct()
    {
        $this->yetki = false;
    }
    public static function kayitileOlustur($kayit){
        
        $kullanici = new Kullanici();
        $kullanici->kullaniciadi    = $kayit['kullaniciadi'];
        $kullanici->ad              = $kayit['ad'];
        $kullanici->soyad           = $kayit['soyadi'];
        $kullanici->email           = $kayit['email'];
        $kullanici->sifre           = $kayit['sifre'];
        
        return $kullanici;
    }
    public static function girisIleOlstur($post){

        $kullanici = new Kullanici();

        $kullaniciadi = $post['kullaniciadi'];
        $sifre=$post['sifre'];

        
        $query = "SELECT * FROM tablokullanicilar WHERE kullaniciadi='$kullaniciadi' AND sifre='$sifre';";

        $result =  $kullanici->sorguYolla($query);

        if($result->num_rows>0){
            $kayit = $result->fetch_assoc();
            
            $kullanici->kullaniciadi    = $kayit['kullaniciadi'];
            $kullanici->ad              = $kayit['ad'];
            $kullanici->soyad           = $kayit['soyad'];
            $kullanici->email           = $kayit['email'];
            $kullanici->sifre           = $kayit['sifre'];
            $kullanici->yetki           = $kullanici->adminMi();
            return $kullanici;
        }
        else
        {
            return null;
        }  
       
    }
    
    public static function veriTabanindanGetir($kullaniciadi){

        $kullanici = new Kullanici();
        
        $query = "SELECT * FROM tablokullanicilar WHERE kullaniciadi='$kullaniciadi';";

        $result =  $kullanici->sorguYolla($query);

        if($result->num_rows>0){
            $kayit = $result->fetch_assoc();

            
            $kullanici->kullaniciadi    = $kayit['kullaniciadi'];
            $kullanici->ad              = $kayit['ad'];
            $kullanici->soyad           = $kayit['soyad'];
            $kullanici->email           = $kayit['email'];
            $kullanici->sifre           = $kayit['sifre'];
            $kullanici->yetki           = $kullanici->adminMi();
            return $kullanici;
        }
        else
        {
            return null;
        }              
    }
    public function adminMi(){
        $query = "SELECT * FROM tabloadminler WHERE kullaniciadi='$this->kullaniciadi';";

        $result =  $this->sorguYolla($query);

        if($result->num_rows>0){
            return true;
        }
        else{
            return false;
        }
    }
    public function kaydet(){
        if($this->kayitVarmi()==false)
        {
            
            $query = "INSERT INTO tablokullanicilar(kullaniciadi, ad, soyad, email,sifre) 
                        VALUES ('$this->kullaniciadi', '$this->ad','$this->soyad','$this->email','$this->sifre')";

            $result =  $this->sorguYolla($query);
            
        }
    }
    public function kitapOduncAl($kitapAdi){
        $sorgu ="insert into tabloodunckitaplar(kullaniciadi,kitapadi) values('$this->kullaniciadi','$kitapAdi')";
        
        $result =  $this->sorguYolla($sorgu);
    }
    public function kitapiadeEt($kitapAdi){
        $sorgu ="delete from tabloodunckitaplar where kullaniciadi='$this->kullaniciadi' and kitapadi='$kitapAdi'";
        
        $result =  $this->sorguYolla($sorgu);
    }
    public function siradakiKitabiGetir(){



        if($this->siradakiOduncKitap==null)
        {
            $sorgu = "SELECT * FROM tabloodunckitaplar WHERE kullaniciadi='$this->kullaniciadi';";
        
            $this->siradakiOduncKitap =  $this->sorguYolla($sorgu);

            
            if($this->siradakiOduncKitap->num_rows>0){
                return $this->siradakiOduncKitap->fetch_assoc();
                
            }            
            else
            {
                $this->siradakiOduncKitap=null;
            }
        }
        else
        {
            return $this->siradakiOduncKitap->fetch_assoc();
        }
        
    }
    public function kitapUstundemi(Kitap $kitap){
        $sorgu = "SELECT * FROM tabloodunckitaplar WHERE kullaniciadi='$this->kullaniciadi';";
        
        $result =  $this->sorguYolla($sorgu);

        if($result->num_rows>0){
            while(($satir=$result->fetch_assoc())!=null)
            {
                if($satir["kitapadi"]==$kitap->kitapAdi)
                    return true;
            }
        }

        return false;
    }
    public function kayitVarmi(){
        
        $query = "SELECT * FROM tablokullanicilar WHERE kullaniciadi='$this->kullaniciadi';";

        $result =  $this->sorguYolla($query);

        if($result->num_rows>0){
            return true;
        }
        else
        {
            return false;
        }

    }
    public function sorguYolla($query){
        $db = new DB();

        return $db->query($query);
    }

}

?>