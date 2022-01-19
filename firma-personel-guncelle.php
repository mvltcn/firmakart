<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['firma_kullanici_adi'])) {
    include "db_conn.php";
    $p_id = $_GET['id'];
    $f_id = $_SESSION['id'];
    $sorgu = $conn->query("SELECT * FROM personel WHERE id=$p_id and  firma_id=$f_id");
    $sonuc = $sorgu->fetch_assoc(); //sorgu çalıştırılıp veriler alınıyor






    if (isset($_POST['submit'])) {
        if ($_FILES["resim"]["size"] < 1024 * 1024) {
            $yeni_ad = $sonuc['personel_resim'];
            $check_value = isset($_POST['durum']) ? 1 : 0;

            $adi = $_POST['adi'];
            $soyAdi = $_POST['soyAdi'];
            $pozisyon = $_POST['pozisyon'];
            $email = $_POST['email'];



            if (empty($adi)) {
                header("Location: firma-personel-guncelle.php?id=".$_GET['id']."&mesaj=Personel adı giriniz");
                exit();
            }else if(empty($soyAdi)){
                header("Location: firma-personel-guncelle.php?id=".$_GET['id']."&mesaj=Personel soyadı giriniz");
                exit();
            }else if(empty($pozisyon)){
                header("Location: firma-personel-guncelle.php?id=".$_GET['id']."&mesaj=Personel pozisyon giriniz");
                exit();
            }else if(empty($email)){
                header("Location: firma-personel-guncelle.php?id=".$_GET['id']."&mesaj=Personel email giriniz");
                exit();
            }else{


            if ($_FILES["resim"]["type"] == ("image/png" || "image/jpg" || "image/jpeg")) {
                $dosya_adi = $_FILES["resim"]["name"];

                $uret = array("as", "rt", "ty", "yu", "fg");
                $uzanti = substr($dosya_adi, -4, 4);
                $sayi_tut = rand(1, 10000);
                $yeni_ad = md5($p_id) . $uret[rand(0, 4)] . $sayi_tut . $uzanti;
                $file_path = "personel/";
                move_uploaded_file($_FILES["resim"]["tmp_name"], $file_path . $yeni_ad);

                unlink($file_path . $sonuc["personel_resim"]);

               


                $guncelleSorgusu = mysqli_query(
                    $conn,
                    "UPDATE personel                 SET  personel_ad='$adi',personel_soyad='$soyAdi',personel_email='$email', personel_pozisyon='$pozisyon',personel_resim='$yeni_ad',tema_durum='$check_value'
                                                     WHERE id='$p_id'"
                );

                header("location:firma-home.php");
                exit;
            }
            $yeni_ad = $sonuc['personel_resim'];   
            $guncelleSorgusu = mysqli_query(
                $conn,
                "UPDATE personel                 SET  personel_ad='$adi',personel_soyad='$soyAdi',personel_email='$email', personel_pozisyon='$pozisyon',personel_resim='$yeni_ad',tema_durum='$check_value'
                                                     WHERE id='$p_id'"
            );




            header("location:firma-personel-bilgileri");
            exit;
        }
    }
}



?>

    <html>

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Anasayfa</title>
        <link href="style/bootstrap.min.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.3/b-2.1.1/datatables.min.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css" />
        <script src="https://kit.fontawesome.com/1b3be615e6.js" crossorigin="anonymous"></script>

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/b-2.1.1/datatables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>





    </head>

    <body style="background: linear-gradient(90deg, hsla(217, 100%, 50%, 1) 0%, hsla(186, 100%, 69%, 1) 100%);">

        <div class="container" >
            <?php include "firma-navbar.php"; ?>

            <div class="pt-3 pb-3"style="background:white; border-radius: 24px; margin-top: 15px;" >
                <form class="row" method="POST" enctype="multipart/form-data">
                    <div class="col-md-4 border-right">
                        <div class="d-flex flex-column align-items-center text-center ">
                            <img class="" style="width: 160px;  height: 200px;  border-radius: 5%;   object-fit: cover;  object-position: 50% 15%;" src="personel/<?php echo $sonuc['personel_resim'] ?>">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Resim Seçiniz</label>
                                <input class="form-control" type="file" id="formFile" name="resim">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 border-right">
                        <div class="p-3">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Personel Düzenle</h4>
                            </div>
                            <div class="row ">
                                <div class="col-md-6"><label class="labels">Adı</label><input type="text" class="form-control"  name="adi" value="<?php echo $sonuc['personel_ad'] ?>"></div>
                                <div class="col-md-6"><label class="labels">Soyadı</label><input type="text" class="form-control"  name="soyAdi" value="<?php echo $sonuc['personel_soyad'] ?>"></div>
                            </div>
                            <div class="row ">
                                <div class="col-md-12"><label class="labels">Pozisyon</label><input type="text" class="form-control"  name="pozisyon" value="<?php echo $sonuc['personel_pozisyon'] ?>"></div>
                                <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" name="email" value="<?php echo $sonuc['personel_email'] ?>"></div>
                                <div class="col-md-12">
                                <label class="form-check-label" for="flexCheckDefault">
                                        Tema düzenleme  
                                    </label>
                                    <input class="form-check-input" type="checkbox" name="durum" value="0" id="flexCheckDefault" <?php if ($sonuc['tema_durum'] == 1) {
                                         echo "checked='checked'"; 
                                                                    }
                                                                             ?>>
                                   
                                </div>



                            </div>

                        </div>

                    </div>
                    <div class=" text-center">
                        <button class="btn btn-primary profile-button" name="submit" type="submit">Personel Güncelle</button>
                    </div>

                </form>
            </div>
           





        </div>







        </div>
    </body>

    </html>
<?php
} else {
    header("Location: index.php");
    exit();
} if (isset($_GET['mesaj'])) {
    include "mesaj.php";
}
?>