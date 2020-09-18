<?php

class Kullanici
{
    public $kullaniciadi;
    public $sifre;

    public static function aktifKullaniciGetir()
    {
        
        session_start();
        if(array_key_exists("kullaniciadi",$_SESSION))
        {

            $kullaniciadi = $_SESSION["kullaniciadi"];
            $sifre = $_SESSION["sifre"] ;

            $kullanici = new Kullanici($kullaniciadi,$sifre);

            return $kullanici;

        }
        else
        {
            return null;
        }

    }
    public function __construct($kullaniciadi,$sifre)
    {
        $this->kullaniciadi = $kullaniciadi;
        $this->sifre = $sifre;
    }
    public function aktifEt(){
        session_start();
        $_SESSION["kullaniciadi"]= $this->kullaniciadi;
        $_SESSION["sifre"] = $this->sifre;
    }
    public function kullaniciDektiviteEt(){
        session_destroy();
    }
}

?>