<?php

include "proses_auth.php";

if ($sub == "index")  {
	
	
	$title = "About";
	
	include temp."header.php";
	include "view/$page.php";
	include temp."footer.php";
	

}
?>
