<?php

class Kullanici
{
    public $kullaniciadi;
    public $ad;
    public $soyad;
    public $email;
    public $sifre;
    public $yetki;

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
 
        return Kullanici::veriTabanindanGetir($post["kullaniciadi"]);
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