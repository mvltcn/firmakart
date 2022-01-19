<?php
include "db_conn.php";
$sorgu = $conn->query("SELECT * FROM firma WHERE id =" . $_SESSION['id']);
$sonuc = $sorgu->fetch_assoc(); //sorgu çalıştırılıp veriler alınıyor


if (isset($_SESSION['id'])) {
     $id = $_SESSION['id'];
     if (isset($_POST['eskiSifre'])) {

          $pass = $_POST['eskiSifre'];
          $newPass = $_POST['yeniSifre'];
          $newRPass = $_POST['yeniSifreTekrar'];
          if (empty($pass)) {
               header("Location: firma-home.php?mesaj=Eski şifre gerekli");
               exit();
          } else if (empty($newPass)) {
               header("Location: firma-home.php?mesaj=Yeni şifre gerekli");
               exit();
          } else if (empty($newRPass)) {
               header("Location: firma-home.php?mesaj=Yeni şifre tekrargerekli");
               exit();
          } else if ($newPass !== $newRPass) {
               header("Location: firma-home.php?mesaj=Şifreler uyuşmuyor");
               exit();
          } else if ($sonuc['firma_sifre'] !== md5($pass)) {
               header("Location: firma-home.php?mesaj=Şifreler uyuşmuyor");
               exit();
          } else {


               $pass = md5($pass);
               $newPass = md5($newPass);

               $guncelleSorgusu = mysqli_query(
                    $conn,
                    "UPDATE firma    SET  firma_sifre='$newPass'
                                   WHERE id =" . $_SESSION['id']
               );

               header("Location: firma-home.php?mesaj=Güncelleme Başarılı");
               exit();
          }
     }

     if (isset($_POST['submit'])) {
          if ($_FILES["firma_logo"]["size"] < 1024 * 1024) {

               $fAdi = $_POST['firmaAdi'];
               $fAdres = $_POST['adres'];
               $fTelefon = $_POST['telefon'];
               $fEmail = $_POST['email'];
               $fWebsite = $_POST['website'];

               if ($_FILES["firma_logo"]["type"] == ("image/png" || "image/jpg" || "image/jpeg")) {
                    $dosya_adi = $_FILES["firma_logo"]["name"];

                    $uret = array("as", "rt", "ty", "yu", "fg");
                    $uzanti = substr($dosya_adi, -4, 4);
                    $sayi_tut = rand(1, 10000);
                    $yeni_ad = md5($_SESSION['id']) . $uret[rand(0, 4)] . $sayi_tut . $uzanti;
                    $file_path = "firmalogo/";
                    move_uploaded_file($_FILES["firma_logo"]["tmp_name"], $file_path . $yeni_ad);

                    unlink($file_path . $sonuc["firma_logo"]);
                    $guncelleSorgusu = mysqli_query(
                         $conn,
                         "UPDATE firma 
                                                     SET  firma_adi='$fAdi',firma_adres='$fAdres',firma_email='$fEmail', firma_telefon='$fTelefon',firma_logo='$yeni_ad',firma_website='$fWebsite'
                                                     WHERE id='$id'"
                    );

                    header("location:firma-home.php");
                    exit;
               }
               $yeni_ad = $sonuc['firma_logo'];
               $guncelleSorgusu = mysqli_query(
                    $conn,
                    "UPDATE firma 
                                                 SET  firma_adi='$fAdi',firma_adres='$fAdres',firma_email='$fEmail', firma_telefon='$fTelefon',firma_logo='$yeni_ad',firma_website='$fWebsite'
                                                 WHERE id='$id'"
               );

               header("location:firma-home");
               exit;
          }
     }
}


?>
<div class="row">
     <div class="col-xs-8 col-sm-8 col-sm-8 p-3">
          <div class="p-3" style=" background:white; width: auto ;height:auto;margin-left: auto;  width: 100%;
margin-right: auto; border-radius: 24px;margin-bottom:15px">
               <form class="  align-items-center text-center" method="POST" action="" enctype="multipart/form-data">
                    <div class=" text-center mb-3">
                         <h4 class="text-right">Firma Bilgileri</h4>
                    </div>
                    <div class="col d-flex flex-column align-items-center text-center ">
                         <div class="text-center  ">
                              <img style="width: 300px;  height: 150px;  border-radius: 5%;   object-fit: contain;  object-position:50 50;" src="firmalogo/<?php echo $sonuc['firma_logo'] ?>">
                              <div class="mb-3">
                                   <label for="formFile" class="form-label">Resim Seçiniz</label>
                                   <input class="form-control" type="file" id="formFile" name="firma_logo">
                              </div>
                         </div>
                    </div>
                    <div class=" border-right">
                         <div class="p-3 ">

                              <div class="mb-3 row">
                                   <label class="col-sm-2 col-form-label">Firma Adı</label>
                                   <div class="col-sm-10">
                                        <input type="text" class="form-control" id="firma_adi" name="firmaAdi" value="<?php echo $sonuc['firma_adi']; ?>">
                                   </div>
                              </div>
                              <div class="mb-3  row">
                                   <label class="col-sm-2 col-form-label">Adres</label>
                                   <div class="col-sm-10">
                                        <input type="text" class="form-control" id="adres" name="adres" value="<?php echo $sonuc['firma_adres']; ?>">
                                   </div>
                              </div>
                              <div class="mb-3 row">
                                   <label class="col-sm-2 col-form-label">Telefon</label>
                                   <div class="col-sm-10">
                                        <input type="text" class="form-control" id="telefon" name="telefon" value="<?php echo $sonuc['firma_telefon']; ?>">
                                   </div>
                              </div>
                              <div class="mb-3 row">
                                   <label class="col-sm-2 col-form-label">Email</label>
                                   <div class="col-sm-10">
                                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $sonuc['firma_email']; ?>">
                                   </div>
                              </div>
                              <div class="mb-3 row">
                                   <label class="col-sm-2 col-form-label">Website</label>
                                   <div class="col-sm-10">
                                        <input type="text" class="form-control" id="website" name="website" value="<?php echo $sonuc['firma_website']; ?>">
                                   </div>
                              </div>




                         </div>

                    </div>
                    <div class=" text-center"><button type="submit" class="btn btn-primary mb-1 profile-button" name="submit" value="Guncelle">Güncelle</button></div>

               </form>

          </div>
     </div>
     <div class=" col-xs-4 col-sm-4 col-sm-4 p-3">
          <div class="p-3" style=" background:white; margin-left: auto; margin-right: auto; border-radius: 24px;margin-bottom:15px">
               <form class="align-items-center text-center" method="POST" action="">

                    <div class="col  border-right">
                         <div class="p-3 ">
                              <div class="text-center mb-3">
                                   <h4 class="">Şifre Bilgileri</h4>
                              </div>

                              <div class="mb-3 row">
                                   <label class="col-sm-4 col-form-label">Eski Şifre</label>
                                   <div class="col-sm-8">
                                        <input type="password" class="form-control" name="eskiSifre" value="">
                                   </div>
                              </div>
                              <div class="mb-3 row">
                                   <label class="col-sm-4 col-form-label">Yeni Şifre</label>
                                   <div class="col-sm-8">
                                        <input type="password" class="form-control" name="yeniSifre" value="">
                                   </div>
                              </div>
                              <div class="mb-3 row">
                                   <label class="col-sm-4 col-form-label">Şifre Tekrar</label>
                                   <div class="col-sm-8">
                                        <input type="password" class="form-control" name="yeniSifreTekrar" value="">
                                   </div>
                              </div>




                         </div>

                    </div>
                    <div class=" text-center"><button type="submit" class="btn btn-primary mb-1 profile-button" name="submit" value="Guncelle">Şifre Güncelle</button></div>

               </form>

          </div>
     </div>
</div>