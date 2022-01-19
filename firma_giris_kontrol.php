<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['fKullaniciAdi']) && isset($_POST['fSifre'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$firma_kullanici_adi = validate($_POST['fKullaniciAdi']);
	$firma_kullanici_sifre = validate($_POST['fSifre']);

	if (empty($firma_kullanici_adi)) {
		header("Location: index.php?mesaj=Kullanıcı adı gerekli");
	    exit();
	}else if(empty($firma_kullanici_sifre)){
        header("Location: index.php?mesaj=Şifre gerekli");
	    exit();
	}else{

        $firma_kullanici_sifre = md5($firma_kullanici_sifre);

        
		$sql = "SELECT * FROM firma WHERE firma_kullanici_adi='$firma_kullanici_adi' AND firma_sifre='$firma_kullanici_sifre'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['firma_kullanici_adi'] === $firma_kullanici_adi && $row['firma_sifre'] === $firma_kullanici_sifre) {
            	$_SESSION['firma_kullanici_adi'] = $row['firma_kullanici_adi'];
            	$_SESSION['firma_adi'] = $row['firma_adi'];
            	$_SESSION['id'] = $row['id'];
				$_SESSION['tema_id'] = $row['tema_id'];
				
            	header("Location: firma-home.php");
		        exit();
            }else{
				header("Location: index.php?mesaj=Kullanıcı adı veya şifre hatalı");
		        exit();
			}
		}else{
			header("Location: index.php?mesaj=Kullanıcı adı veya şifre hatalı");
	        exit();
		}
	}
	
}else{
	header("Location: firmakart/giris.php");
	exit();
}