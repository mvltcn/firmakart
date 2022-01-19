<?php
$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "firmakart";
$conn = mysqli_connect($sname, $unmae, $password, $db_name);
$conn -> Set_charset("utf8");




if (!$conn) {
	echo "Bağlantı hatası!";
}