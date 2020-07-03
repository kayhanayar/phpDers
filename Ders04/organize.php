<?php
    require_once("db.php");
    
    $query = "SELECT * FROM kullanicilar";
    
    $result = mysqli_query($db_server,$query);
    //Veri tabanında veri yoksa formda textboxlar boş görünmesi için
    $kullaniciAdi   = "";
    $adi            = "";
    $soyadi         = "";
    $email          = "";
  
?>

<style>
.form {
    padding: 16px;

}
 input[type=text]{
     width: 100%;
     padding: 12px 20px;
     border-radius: 8px;
     border: 2px solid red;
 }   

 input[type=submit],input[type=button] {
    background-color: red;
    border: none;
    color: white;
    padding: 16px 32px;
    margin-top: 10px;
 }
</style>
<form action="organize.php" method="POST">
    <label for="kullaniciadi">Email</label>
    
    <?php 
        if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
        {
            $kullaniciAdi   = $_POST['kullaniciadi'];

            if(isset($_POST["ara"]))
            {
                $guncelKullaniciadi = $_POST['kullaniciadi'];
                
                $kullaniciBilgileri = kullanciGetir($db_server,$guncelKullaniciadi);
                $kullaniciadi  = $kullaniciBilgileri['kullaniciadi'];
                $adi = $kullaniciBilgileri['adi'];
                $soyad = $kullaniciBilgileri['soyadi'];
                $email = $kullaniciBilgileri['email'];
                echo "<input type='text' placeholder='kullaniciadi' name='kullaniciadi' value='$kullaniciadi' >";
                echo "<label for='adi'><b>Ad</b></label>";
                echo "<input type='text' placeholder='Ad' name='ad' value='$adi' >";

                echo "<label for='Soyad'><b>Soyad</b></label>";
                echo "<input type='text' placeholder='Soyad' name='soyad' value='$soyad' >";

                echo "<label for='email'><b>Ad</b></label>";
                echo "<input type='text' placeholder='email' name='email' value='$email' >";
                echo "<br/>";
                echo "<input type='hidden' name='guncelKullaniciAdi' value='$guncelKullaniciadi' >";

                echo "<input type='submit' name='guncelle' value='Güncelle'>";
            }
            if(isset($_POST["guncelle"]))
            {
               $result =  kullaniciGuncelle($db_server,$_POST["guncelKullaniciAdi"],$_POST);
               if($result)
               {
                   echo "güncelleme yapıldı";
               }
            }

        
        }
        else
        {
            echo "<input type='text' placeholder='kullaniciadi' name='kullaniciadi' >";
            echo "<input type='submit' name='ara' value='ara'>";
        }   
    ?>
    <br/>
 
</form>
