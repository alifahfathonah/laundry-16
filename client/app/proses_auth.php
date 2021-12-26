<?php

if ($level == "member") {
	$sql = "SELECT * FROM member WHERE username='$user_now'";
		$query = mysqli_query($conn, $sql);
		$hasil = mysqli_fetch_array($query);
		
		if($hasil == TRUE) {
			$username		= $hasil['username'];	
			$password		= $hasil['password'];
			$nama_lengkap  = $hasil['nama_lengkap'];
			
			
				$dir_foto	= "assets/gbr/user.png";
			
		} else {
			
			header("location:".$link);
		}
		
		
} else if ($level == ""){
	header("location:".$link);
}	
	
?>
