<?php

class Kullanici
{
    public $kullaniciadi;
    public $ad;
    public $soyad;
    public $email;
    public $sifre;


    public function __construct()
    {

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
    public static function girisIleOlstur($giris){
        $kullanici = new Kullanici();
        
        $kullaniciadi = $giris["kullaniciadi"];
            
        $sifre = $giris["sifre"] ;
        
        return $kullanici;
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