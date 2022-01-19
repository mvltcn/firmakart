<?php
ob_start();
    include("db_conn.php");
    
    $sas = $_SESSION['personel_ui'];
    $sorgu = $conn->query("SELECT * FROM personel WHERE personel_ui='$sas'");


  
    $sonuc = $sorgu->fetch_assoc(); 
    

    
echo '
<div class="col-xs-8 col-sm-8 col-sm-8" >
<div class="" style=" background:white; width: auto ;height:auto;margin-left: auto;  width: 100%;
margin-right: auto; border-radius: 24px;margin-bottom:15px">
    <form class="p-3" action="" method="POST" enctype="multipart/form-data">
             <div class="mb-3" style="text-align: center">
                    <h4 class="text-right">Personel Bilgileri</h4>
                </div>
            <div class="d-flex flex-column align-items-center text-center  ">
                <img style="width: 160px;  height: 200px;  border-radius: 5%;   object-fit: cover;  object-position: 50% 15%;" src="personel/'; echo $sonuc['personel_resim'];echo'">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Resim Seçiniz</label>
                    <input class="form-control" type="file" id="formFile" name="resim">
                </div>
            </div>
           
            <div class="px-2 ">
                
                <div class="row">
                    <div class="col-md-6"><label class="labels">Adı</label><input type="text" class="form-control" name="adi" value="';echo $sonuc['personel_ad']; echo'"></div>
                    <div class="col-md-6"><label class="labels">Soyadı</label><input type="text" class="form-control"  name="soyAdi" value="'; echo $sonuc['personel_soyad']; echo'"></div>
                </div>
                <div class="row ">
                    <div class="col-md-12"><label class="labels">Pozisyon</label><input type="text" class="form-control" name="pozisyon" value="'; echo $sonuc['personel_pozisyon']; echo'"></div>
                    <div class="col-md-12"><label class="labels">Telefon Numarası</label><input type="text" class="form-control"  name="telefon" value="';echo $sonuc['personel_tel']; echo'"></div>
                 
                    <div class="col-md-12"><label class="labels">Email</label><input type="email" class="form-control"  name="email" value="'; echo $sonuc['personel_email']; echo'"></div>

                    <div class="col-md-12"><label class="labels">Adres</label><input type="text" class="form-control"  name="adres" value="'; echo $sonuc['personel_adres']; echo'"></div>
                 </div>  
                    <div class="row">
                        <div class="col-md-6"><label class="labels">Facebook</label><input type="text" class="form-control"  name="facebook" value="'; echo $sonuc['personel_facebook']; echo'" ></div>
                        <div class="col-md-6""><label class="labels">Twitter</label><input type="text" class="form-control" name="twitter" value="'; echo $sonuc['personel_twitter']; echo'" ></div>
                    </div>  

                    <div class="row">
                        <div class="col-md-6""><label class="labels">Linkedin</label><input type="text" class="form-control" name="linkedin" value="'; echo $sonuc['personel_linkedin']; echo'" ></div>
                        <div class="col-md-6""><label class="labels">Instagram</label><input type="text" class="form-control" name="instagram" value="'; echo $sonuc['personel_instagram']; echo'" ></div>
                    </div>
                    

             </div>
                <div class="text-center" style="padding-top:10px">
                    

                    <button class="btn btn-primary profile-button" name="submit" type="submit">Profili Güncelle</button>
                   
                    </div>

    </form>
    </div>
    </div>
    
    <div class="col-xs-4 col-sm-4 col-sm-4" >
    <div class="" style=" background:white; width: auto ;height:auto;margin-left: auto;  width: 100%;
 margin-right: auto; border-radius: 24px">
    <form class="p-3" action="" method="POST" ">
        
        <div class="col border-right">
            <div class="px-2 ">
                <div class=" text-center mb-3">
                    <h4 class="text-right">Şifre İşlemleri</h4>
                </div>
                
                <div class="col ">
                    
                    <div class="col-md-12"><label class="labels">Eski Şifre</label><input type="password" class="form-control"  name="eskiSifre" value=""></div>
                    <div class="col-md-12"><label class="labels">Yeni Şifre</label><input type="password" class="form-control"  name="yeniSifre" value=""></div>
                    <div class="col-md-12"><label class="labels">Yeni Şifre Tekrar</label><input type="password" class="form-control"  name="yeniSifreTekrar" value=""></div>




                </div>

            </div>

        </div>
        <div class="p-2 text-center">
            <button class="btn btn-primary profile-button" name="submit" type="submit">Şifre Güncelle</button>
            
        </div>

    </form>
    </div>
    </div>

    ';
    if (isset($_POST['eskiSifre'])) {

        $pass=$_POST['eskiSifre'];
        $newPass=$_POST['yeniSifre'];
        $newRPass=$_POST['yeniSifreTekrar'];

       
        
         if(empty($pass)){
            header("Location: personel-home.php?mesaj=Eski şifre gerekli");
            exit();
        }
        else if(empty($newPass)){
            header("Location: personel-home.php?mesaj=Yeni şifre gerekli");
            exit();
        }
    
        else if(empty($newRPass)){
            header("Location: personel-home.php?mesaj=Yeni şifre tekrargerekli");
            exit();
        }
    
        else if($newPass !== $newRPass){
            header("Location: personel-home.php?mesaj=Şifreler uyuşmuyor");
            exit();
        }
        else if($sonuc['personel_sifre'] !== md5($pass)){
            header("Location: personel-home.php?mesaj=Şifreler uyuşmuyor");
            exit();
        }
    
        else{ 
            
    
            $pass = md5($pass);
            $newPass=md5($newPass);

            $guncelleSorgusu = mysqli_query(
                $conn,
                "UPDATE personel    SET  personel_sifre='$newPass'
                                  WHERE personel_ui='$sas'"
              );
        
         header("Location: personel-home.php?mesaj=Güncelleme Başarılı");
         exit();
         }
   
    }
   
    if (isset($_POST['submit'])) {

        
        
        if ($_FILES["resim"]["size"] < 1024 * 1024) {

            $adi = $_POST['adi'];
            $soyAdi = $_POST['soyAdi'];
            $pozisyon = $_POST['pozisyon'];
            $telefon = $_POST['telefon'];
            $adres = $_POST['adres'];
            $email = $_POST['email'];
            $facebook = $_POST['facebook'];
            $twitter = $_POST['twitter'];
            $linkedin = $_POST['linkedin'];
            $instagram = $_POST['instagram'];
            $id = $sonuc['id'];

            if (empty($adi)) {
                header("Location: personel-home.php?mesaj=Personel adı giriniz");
                exit();
            }else if(empty($soyAdi)){
                header("Location: personel-home.php?mesaj=Personel soyadı giriniz");
                exit();
            }else if(empty($pozisyon)){
                header("Location: personel-home.php?mesaj=Personel pozisyon giriniz");
                exit();
            }else if(empty($email)){
                header("Location: personel-home.php?mesaj=Personel email giriniz");
                exit();
            }else{



            if ($_FILES["resim"]["type"] == ("image/png"|| "image/jpg"|| "image/jpeg")) {
                $dosya_adi = $_FILES["resim"]["name"];

                $uret = array("as", "rt", "ty", "yu", "fg");
                $uzanti = substr($dosya_adi, -4, 4);
                $sayi_tut = rand(1, 10000);
                $yeni_ad = md5($sas). $uret[rand(0, 4)] . $sayi_tut . $uzanti;
                $file_path = "personel/";
                move_uploaded_file($_FILES["resim"]["tmp_name"], $file_path . $yeni_ad);


                unlink($file_path . $sonuc["personel_resim"]);
               




                $guncelleSorgusu = mysqli_query(
                    $conn,
                    "UPDATE personel 
                                                     SET  personel_ad='$adi',personel_soyad='$soyAdi',personel_pozisyon='$pozisyon', personel_tel='$telefon',personel_adres='$adres',personel_email='$email',
                                                     personel_resim='$yeni_ad',personel_facebook='$facebook',personel_twitter='$twitter',personel_linkedin='$linkedin',personel_instagram='$instagram'
                                                     WHERE personel_ui='$sas'"
                );

                header("Location: personel-home.php?mesaj=Güncelleme Başarılı");
		        exit();
            } else {


                $yeni_ad = $sonuc['personel_resim'];

                $guncelleSorgusu = mysqli_query(
                    $conn,
                    "UPDATE personel 
                                                                                                SET  personel_ad='$adi',personel_soyad='$soyAdi',personel_pozisyon='$pozisyon', personel_tel='$telefon',personel_adres='$adres',personel_email='$email',
                                                                                                personel_resim='$yeni_ad',personel_facebook='$facebook',personel_twitter='$twitter',personel_linkedin='$linkedin',personel_instagram='$instagram'
                                                                                                
                                                                                                WHERE personel_ui='$sas'"
                );





               
             }///header("location:personel-home"); 
            }
            //header("location:personel-home"); 
        }
       
        header("Location: personel-home.php?mesaj=Güncelleme Başarılı");
        exit();
    }
     

   
    ob_end_flush();
    ?>


