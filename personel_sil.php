<?php 
include "db_conn.php";
		if(isset($_GET['id'])){
			$id=$_GET['id'];
			$silSorgusu="DELETE FROM personel WHERE id='$id'";
			if(mysqli_query($conn, $silSorgusu)) {
			    header("Location: firma-personel-bilgileri.php");
			}
		}
	?>