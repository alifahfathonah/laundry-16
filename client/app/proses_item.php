<?php

include "proses_auth.php";

if ($sub == "index")  {
	
	
	$title = "Daftar Item";
	
	
	$ada = "";
	
	
	$sql = mysqli_query($conn, "SELECT * FROM item  ORDER BY id_item DESC");
	
	
		
	include temp."header.php";
	include "view/$page.php";
	include temp."footer.php";
	

}
?>
