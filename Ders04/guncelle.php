<?php 
    $db_hostname = "localhost";
    $db_database = "dbsite";
    $db_username ="kayhan";
    $db_password ="123";

    $db_server = mysqli_connect($db_hostname,$db_username,$db_password);

    if(!$db_server)
        echo "mysql'e bağlanamadı".mysqli_error($db_server);
    
    mysqli_select_db($db_server,$db_database);
    
    $query = "SELECT * FROM kullanicilar";
    
    $result = mysqli_query($db_server,$query);
    //Veri tabanında veri yoksa formda textboxlar boş görünmesi için
    $kullaniciAdi   = "";
    $adi            = "";
    $soyadi         = "";
    $email          = "";

if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
    $kullaniciAdi   = $_POST['kullaniciAdi'];
    $adi            = $_POST['ad'];
    $soyadi         = $_POST['soyadi'];
    $email          = $_POST['email'];
        
    if(isset($_POST["sonraki"]))
    {
        if($result->num_rows>0)
        {
           
            while($row = $result->fetch_assoc())
            {
                if($row["kullaniciadi"]==$_POST["kullaniciAdi"])
                {
                    break;
                }
            }
            $row = $result->fetch_assoc();
            
            if($row==null)
            {
                 mysqli_data_seek($result,0);
                $row = $result->fetch_assoc();
            }
            $kullaniciAdi   = $row['kullaniciadi'];
            $adi            = $row['adi'];
            $soyadi         = $row['soyadi'];
            $email          = $row['email'];

        }
    }
    else if(isset($_POST["onceki"]))
    {
        if($result->num_rows>0)
        {
            $oncekisatir = $result->fetch_assoc();
            while($row = $result->fetch_assoc())
            {
                if($row["kullaniciadi"]==$_POST["kullaniciAdi"])
                {
                    break;
                }
                $oncekisatir = $row;
            }
            
            $kullaniciAdi   = $oncekisatir['kullaniciadi'];
            $adi            = $oncekisatir['adi'];
            $soyadi         = $oncekisatir['soyadi'];
            $email          = $oncekisatir['email'];

        }      
    }
    else if(isset($_POST["guncelle"]))
    {
        $guncelKullaniciadi = $_POST['guncelKullaniciAdi'];
        $query = "UPDATE kullanicilar SET kullaniciadi='$kullaniciAdi', adi='$adi', soyadi='$soyadi', email='$email' WHERE kullaniciadi='$guncelKullaniciadi';";

        $result = mysqli_query($db_server,$query);
        if($result)
        {
            echo "<br/>guncellendi";
        }
    }


   
}
else
{
    if($result->num_rows>0)
    {
           
        $row = $result->fetch_assoc();
        $kullaniciAdi   = $row['kullaniciadi'];
        $adi            = $row['adi'];
        $soyadi         = $row['soyadi'];
        $email          = $row['email'];
    }
}
mysqli_close($db_server);
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
<form action="guncelle.php" method="POST">
    <label for="email">Email</label>
    <input type="text" placeholder="Email" name="email" value="<?php echo $email ?>" >
    <br/>
    <label for="kullaniciAdi"><b>Kullanıcı Adi</b></label>
    <input type="text" placeholder="Kullanıcı Adı" name="kullaniciAdi" value="<?php echo $kullaniciAdi ?>" >
    <br/>
    <label for="adi"><b>Ad</b></label>
    <input type="text" placeholder="Ad" name="ad" value="<?php echo $adi ?>" >
    <br/>
    <label for="soyadi"><b>Soyadı</b></label>
    <input type="text" placeholder="Soyad" name="soyadi" value="<?php echo $soyadi ?>" >
    <input type="submit" name="onceki" value="onceki">
    <input type="submit" name="guncelle" value="güncelle">
    <input type="hidden" name="guncelKullaniciAdi" value="<?php echo $kullaniciAdi ?>" >
    <input type="submit" name="sonraki" value="sonraki">
</form>
