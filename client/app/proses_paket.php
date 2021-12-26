<?php

include "proses_auth.php";

if ($sub == "index")  {
	
	
	$title = "Daftar Paket";
	
	
	$ada = "";
	
	
	$sql = mysqli_query($conn, "SELECT * FROM paket  ORDER BY id_paket DESC");
	
	
		
	include temp."header.php";
	include "view/$page.php";
	include temp."footer.php";
	

}
?>
