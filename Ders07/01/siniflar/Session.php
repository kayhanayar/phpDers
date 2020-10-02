<?php

class Session
{
    public function __construct()
    {
       $this->start();

    }
    public static function aktifKullaniciGetir()
    {
        Session::start();

        if(Session::kullaniciAktifmi())
        {
            $kullanici = Kullanici::girisIleOlstur($_SESSION);

            return $kullanici;
        }
        else
        {
            return null;
        }
    }
    public static function kullaniciAktifmi()
    {
        if(array_key_exists("kullaniciadi",$_SESSION))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public static function kullaniciAktifet(Kullanici $kullanici){
        Session::start();
        $_SESSION["kullaniciadi"]= $kullanici->kullaniciadi;
        $_SESSION["sifre"] = $kullanici->sifre;
    }
    public static function start(){
         //session aktif mi kontrol ediliyor
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
    public static function yoket(){
       Session::start();
       session_destroy(); 
    }
}
?>