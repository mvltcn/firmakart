<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['pEmail']) && isset($_POST['pSifre'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$personel_email = validate($_POST['pEmail']);
	$personel_sifre = validate($_POST['pSifre']);

	if (empty($personel_email)) {
		header("Location: index.php?mesaj=Kullanıcı adı gerekli");
	    exit();
	}else if(empty($personel_email)){
        header("Location: index.php?mesaj=Şifre gerekli");
	    exit();
	}else{

        $personel_sifre = md5($personel_sifre);

        
		$sql = "SELECT * FROM personel WHERE personel_email='$personel_email' AND personel_sifre='$personel_sifre'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['personel_email'] === $personel_email && $row['personel_sifre'] === $personel_sifre) {
            	$_SESSION['personel_email'] = $row['personel_email'];
            	$_SESSION['personel_ui'] = $row['personel_ui'];
            	$_SESSION['id'] = $row['id'];
				$_SESSION['tema_durum']=$row['tema_durum'];
				
            	header("Location: personel-home.php");
		        exit();
            }else{
				header("Location: indexgiris.php?mesaj=Kullanıcı adı veya şifre hatalı");
		        exit();
			}
		}else{
			header("Location: index.php?mesaj=Kullanıcı adı veya şifre hatalı");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}