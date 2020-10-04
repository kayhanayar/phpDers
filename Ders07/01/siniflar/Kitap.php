<?php

class Kitap
{
    public $kitapAdi;
    public $yazarAdi;
    public $isbn;
    public $adet;
    private static $siradaki=null;
    public static function postile($post){
        $kitap = new Kitap();
        print_r($post);
        $kitap->kitapAdi= $post["kitapadi"];
        $kitap->yazarAdi= $post["yazaradi"];
        $kitap->isbn    = $post["isbn"];
        $kitap->adet    = $post["adet"];
        return $kitap;
    }
    public function kaydet(){
        $sorgu = "insert into tablokitaplar(kitapadi,yazaradi,isbn,adet) values ('$this->kitapAdi','$this->yazarAdi','$this->isbn','$this->adet');";
        $db = new DB();
        return $db->query($sorgu);
    }
    public static function siradakiniGetir(){
        if(Kitap::$siradaki)
        {
            $kayit = Kitap::$siradaki->fetch_assoc();
            if($kayit==null)
                return null;
            else
                return Kitap::satirileOlustur($kayit);
        }
        else
        {
            $sorgu = "select * from tablokitaplar";
            $db= new DB();
            Kitap::$siradaki = $db->query($sorgu);
           
            if(Kitap::$siradaki->num_rows>0){
                $kayit =Kitap::$siradaki->fetch_assoc();

                if($kayit==null)
                    return null;
                else
                    return Kitap::satirileOlustur($kayit);
            } 
            else
            {
                return null;
            }
            
        }
    }
    public static function kitapAdiIleOlustur($kitapAdi){
        $sorgu = "select * from tablokitaplar where kitapadi='$kitapAdi'";
        $db= new DB();
        $result = $db->query($sorgu);
       
        if($result->num_rows>0){
            $kayit = $result->fetch_assoc();

            if($kayit==null)
                return null;
            else
                return Kitap::satirileOlustur($kayit);
        } 
        else
        {
            return null;
        } 
    }
    public function adetAzalt(){
        $this->adet--;
    }
    public function adetArttir(){
        $this->adet++;
    }
    public  function guncelle(){
        $sorgu = "update tablokitaplar 
                    set kitapadi='$this->kitapAdi', yazaradi='$this->yazarAdi',isbn='$this->isbn',adet='$this->adet' 
                    where kitapadi='$this->kitapAdi';";
        
        $db= new DB();
        
        $result = $db->query($sorgu);      
    }
    private static function satirileOlustur($satir){
        $kitap = new Kitap();
        $kitap->kitapAdi = $satir["kitapadi"];
        $kitap->yazarAdi = $satir["yazaradi"];
        $kitap->isbn = $satir["isbn"];
        $kitap->adet = $satir["adet"];
        return $kitap;
    }

}



?>