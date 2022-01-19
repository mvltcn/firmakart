<?php
include "db_conn.php";



if (isset($_SESSION['id'])) {

     if (isset($_POST['submit'])) {


          $fAdi = $_POST['firmaAdi'];
          $fAdres = $_POST['adres'];
          $fTelefon = $_POST['telefon'];
          $fEmail = $_POST['email'];
          $fWebsite = $_POST['website'];
          $fKullaniciAdi = $_POST['kullaniciAdi'];

          $sifre = md5("12345");

          if (empty($fAdi)) {
               header("Location: admin-firma.php?mesaj=Firma Adı gerekli");
               exit();
          } else if (empty($fKullaniciAdi)) {
               header("Location: admin-firma.php?mesaj=Firma Adı gerekli");
               exit();
          } else {



               if ($_FILES["firma_logo"]["size"] < 1024 * 1024) {

                    $renk1 = "#16697a";
                    $renk2 = "#489fb5";
                    $renk3 = "#82c0cc";
                    $renk4 = "#ede7e3";
                    $renk5 = "#204546";
                    $renk6 = "#1d3557";

                    if ($_FILES["firma_logo"]["type"] == ("image/png" || "image/jpg" || "image/jpeg")) {
                         $dosya_adi = $_FILES["firma_logo"]["name"];

                         $uret = array("as", "rt", "ty", "yu", "fg");
                         $uzanti = substr($dosya_adi, -4, 4);
                         $sayi_tut = rand(1, 10000);
                         $yeni_ad = md5($_POST['kullaniciAdi']) . $uret[rand(0, 4)] . $sayi_tut . $uzanti;
                         $file_path = "firmalogo/";
                         move_uploaded_file($_FILES["firma_logo"]["tmp_name"], $file_path . $yeni_ad);


                         $sonucTema = $conn->query(sprintf("INSERT INTO tema (renk1,renk2,renk3,renk4,renk5,renk6) 
                                                            VALUES ('$renk1','$renk2','$renk3','$renk4','$renk5','$renk6')"));

                         $son_id = $conn->insert_id;

                         $sonuc = $conn->query(sprintf("INSERT INTO firma (firma_adi, firma_adres, firma_telefon,firma_email,firma_website,firma_logo,firma_kullanici_adi,tema_id,firma_sifre) 
                                                            VALUES ('$fAdi', '$fAdres', '$fTelefon','$fEmail','$fWebsite','$yeni_ad','$fKullaniciAdi','$son_id','$sifre')"));

                         header("location:admin-firma");
                         exit;
                    }

                    $yds = md5($fKullaniciAdi);
                    $yeni_dosya_ad = "$yds.png";
                    copy('firmalogo/logo.png', "firmalogo/$yeni_dosya_ad");

                    $sonucTema = $conn->query(sprintf("INSERT INTO tema (renk1,renk2,renk3,renk4,renk5,renk6) 
                                                        VALUES ('$renk1','$renk2','$renk3','$renk4','$renk5','$renk6')"));
                    $son_id = $conn->insert_id;
                    $sonuc = $conn->query(sprintf("INSERT INTO firma (firma_adi, firma_adres, firma_telefon,firma_email,firma_website,firma_logo,firma_kullanici_adi,tema_id,firma_sifre) 
                                                   VALUES ('$fAdi', '$fAdres', '$fTelefon','$fEmail','$fWebsite','$yeni_dosya_ad','$fKullaniciAdi','$son_id','$sifre')"));

                    header("location:admin-firma");
                    exit;
               }
          }
     }
}

?>
<div class="p-3" style="background:white; border-radius: 24px; margin-top: 15px;">
     <form class="row" method="POST" action="" enctype="multipart/form-data">
          <div class="text-center ">
               <h4 class="text">Firma Bilgileri</h4>
          </div>
          <div class="col-md-4 border-right">
               <div class="d-flex flex-column align-items-center text-center  ">
                    <img style="width: 300px;  height: 200px;  border-radius: 5%;   object-fit: contain;  object-position:50 50;" src="firmalogo/logo.png">
                    <div class="mb-3">
                         <label for="formFile" class="form-label">Resim Seçiniz</label>
                         <input class="form-control" type="file" id="formFile" name="firma_logo">
                    </div>
               </div>
          </div>
          <div class="col-md-8  border-right">
               <div class="p-3 ">

                    <div class="mb-3 row">
                         <label class="col-sm-2 col-form-label">Kullanıcı Adı</label>
                         <div class="col-sm-10">
                              <input type="text" class="form-control" id="firma_kullanıcı" name="kullaniciAdi" placeholder="*zorunlu alan" value="">
                         </div>
                    </div>
                    <div class="mb-3 row">
                         <label class="col-sm-2 col-form-label">Firma Adı</label>
                         <div class="col-sm-10">
                              <input type="text" class="form-control" id="firma_adi" name="firmaAdi" placeholder="*zorunlu alan" value="">
                         </div>
                    </div>
                    <div class="mb-3  row">
                         <label class="col-sm-2 col-form-label">Adres</label>
                         <div class="col-sm-10">
                              <input type="text" class="form-control" id="adres" name="adres" value="">
                         </div>
                    </div>
                    <div class="mb-3 row">
                         <label class="col-sm-2 col-form-label">Telefon</label>
                         <div class="col-sm-10">
                              <input type="text" class="form-control" id="telefon" name="telefon" value="">
                         </div>
                    </div>
                    <div class="mb-3 row">
                         <label class="col-sm-2 col-form-label">Email</label>
                         <div class="col-sm-10">
                              <input type="text" class="form-control" id="email" name="email" value="">
                         </div>
                    </div>
                    <div class="mb-3 row">
                         <label class="col-sm-2 col-form-label">Website</label>
                         <div class="col-sm-10">
                              <input type="text" class="form-control" id="website" name="website" value="">
                         </div>
                    </div>




               </div>

          </div>
          <div class=" text-center"><button type="submit" class="btn btn-primary mb-1 profile-button" name="submit" value="Firma Ekle">Firma Ekle</button></div>

     </form>

</div>