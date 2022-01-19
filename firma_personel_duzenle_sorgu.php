<?php
session_start();

include "db_conn.php";
$p_id = $_GET['id'];
$f_id = $_SESSION['id'];
$sorgu = $conn->query("SELECT * FROM personel WHERE id=$p_id and  firma_id=$f_id");
$sonuc = $sorgu->fetch_assoc(); //sorgu çalıştırılıp veriler alınıyor


if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    if (isset($_POST['submit'])) {
        if ($_FILES["resim"]["size"] < 1024 * 1024) {
            $yeni_ad = $sonuc['personel_resim'];

            if ($_FILES["resim"]["type"] == ("image/png" || "image/jpg" || "image/jpeg")) {
                $dosya_adi = $_FILES["resim"]["name"];

                $uret = array("as", "rt", "ty", "yu", "fg");
                $uzanti = substr($dosya_adi, -4, 4);
                $sayi_tut = rand(1, 10000);
                $yeni_ad = md5($p_id) . $uret[rand(0, 4)] . $sayi_tut . $uzanti;
                $file_path = "firmalogo/";
                move_uploaded_file($_FILES["resim"]["tmp_name"], $file_path . $yeni_ad);

                unlink($file_path . $sonuc["personel_resim"]);

                $adi = $_POST['adi'];
                $soyAdi = $_POST['soyAdi'];
                $pozisyon = $_POST['pozisyon'];
                $email = $_POST['email'];


                $guncelleSorgusu = mysqli_query(
                    $conn,
                    "UPDATE personel                 SET  personel_ad='$adi',personel_soyad='$soyAdi',personel_email='$email', personel_pozisyon='$pozisyon,personel_resim='$yeni_ad'
                                                     WHERE id='$p_id'"
                );

              //  header("location:firma-home.php");
                exit;
            }
            $yeni_ad = $sonuc['resim'];
            $adi = $_POST['adi'];
            $soyAdi = $_POST['soyAdi'];
            $pozisyon = $_POST['pozisyon'];
            $email = $_POST['email'];


            $guncelleSorgusu = mysqli_query(
                $conn,
                "UPDATE personel                 SET  personel_ad='$adi',personel_soyad='$soyAdi',personel_email='$email', personel_pozisyon='$pozisyon,personel_resim='$yeni_ad'
                                                     WHERE id='$p_id'"
            );




           // header("location:http://localhost/firmaproje/home.php");
            exit;
        }
    }
}
