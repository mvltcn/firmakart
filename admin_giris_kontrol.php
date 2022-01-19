<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['aKullaniciAdi']) && isset($_POST['aSifre'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$admin_kullanici_adi = validate($_POST['aKullaniciAdi']);
	$admin_kullanici_sifre = validate($_POST['aSifre']);

	if (empty($admin_kullanici_adi)) {
		header("Location: admin-login.php?mesaj=Kullanıcı adı gerekli");
	    exit();
	}else if(empty($admin_kullanici_sifre)){
        header("Location: admin-login.php?mesaj=Şifre gerekli");
	    exit();
	}else{

        $admin_kullanici_sifre = md5($admin_kullanici_sifre);

        
		$sql = "SELECT * FROM admin WHERE admin_kullanici_adi='$admin_kullanici_adi' AND admin_sifre='$admin_kullanici_sifre'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['admin_kullanici_adi'] === $admin_kullanici_adi && $row['admin_sifre'] === $admin_kullanici_sifre) {
            	$_SESSION['admin_kullanici_adi'] = $row['admin_kullanici_adi'];
            	$_SESSION['id'] = $row['id'];
				
            	header("Location: admin-home.php");
		        exit();
            }else{
				header("Location: admin-login.php?mesaj=Kullanıcı adı veya şifre hatalı");
		        exit();
			}
		}else{
			header("Location: admin-login.php?mesaj=Kullanıcı adı veya şifre hatalı");
	        exit();
		}
	}
	
}else{
	header("Location: firmakart/giris.php");
	exit();
}