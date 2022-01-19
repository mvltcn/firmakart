<?php
session_start();
include "db_conn.php";


if (isset($_SESSION['id'])) {



    if (isset($_POST['submit'])) {
        $check_value = isset($_POST['durum']) ? 1 : 0;

      

        $adi = $_POST['adi'];
        $soyAdi = $_POST['soyAdi'];
        $pozisyon = $_POST['pozisyon'];
        $email = $_POST['email'];
        $f_id = $_SESSION['id'];
        $u_id = md5($email);
        $sifre = md5("12345");
        $temaid = $_SESSION['tema_id'];

        $sorgu = "SELECT * FROM tema WHERE id='$temaid'";
        $sorguSonucu = mysqli_query($conn, $sorgu);
        $tema = $sorguSonucu->fetch_assoc();

        $renk1 = $tema['renk1'];
        $renk2 = $tema['renk2'];
        $renk3 = $tema['renk3'];
        $renk4 = $tema['renk4'];
        $renk5 = $tema['renk5'];
        $renk6 = $tema['renk6'];

        if (empty($adi)) {
            header("Location: firma-personel-bilgileri.php?mesaj=Personel adı giriniz");
            exit();
        }else if(empty($soyAdi)){
            header("Location: firma-personel-bilgileri.php.php?mesaj=Personel soyadı giriniz");
            exit();
        }else if(empty($pozisyon)){
            header("Location: firma-personel-bilgileri.php.php?mesaj=Personel pozisyon giriniz");
            exit();
        }else if(empty($email)){
            header("Location: firma-personel-bilgileri.php.php?mesaj=Personel email giriniz");
            exit();
        }else{



        if ($_FILES["resim"]["size"] < 1024 * 1024) {

            if ($_FILES["resim"]["type"] == ("image/png" || "image/jpg" || "image/jpeg")) {
                $dosya_adi = $_FILES["resim"]["name"];

                $uret = array("as", "rt", "ty", "yu", "fg");
                $uzanti = substr($dosya_adi, -4, 4);
                $sayi_tut = rand(1, 10000);
                $yeni_ad = md5($_SESSION['id']) . $uret[rand(0, 4)] . $sayi_tut . $uzanti;
                $file_path = "personel/";


                if (move_uploaded_file($_FILES["resim"]["tmp_name"], $file_path . $yeni_ad)) {





                    $sonuc = $conn->query(sprintf("INSERT INTO personel (personel_ad, personel_soyad, personel_pozisyon,personel_email,personel_resim,personel_sifre,personel_ui,firma_id,tema_durum,personel_temaRenk1,personel_temaRenk2,personel_temaRenk3,personel_temaRenk4,personel_temaRenk5,personel_temaRenk6) 
                                                            VALUES ('$adi', '$soyAdi', '$pozisyon','$email','$yeni_ad','$sifre','$u_id','$f_id','$check_value','$renk1','$renk2','$renk3','$renk4','$renk5','$renk6')"));





                    header("Location: firma-personel-bilgileri");
                }
            }
            $yds = md5($email);
            $yeni_dosya_ad = "$yds.png";
            copy('personel/profil.png', "personel/$yeni_dosya_ad");
    
            $sonuc = $conn->query(sprintf("INSERT INTO personel (personel_ad, personel_soyad, personel_pozisyon,personel_email,personel_resim,personel_sifre,personel_ui,firma_id,tema_durum,personel_temaRenk1,personel_temaRenk2,personel_temaRenk3,personel_temaRenk4,personel_temaRenk5,personel_temaRenk6) 
            VALUES ('$adi', '$soyAdi', '$pozisyon','$email','$yeni_dosya_ad','$sifre','$u_id','$f_id','$check_value','$renk1','$renk2','$renk3','$renk4','$renk5','$renk6')"));
            header("Location: firma-personel-bilgileri");


        }
        }
    }
}
