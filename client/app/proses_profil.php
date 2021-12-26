<?php

include "proses_auth.php";

if ($sub == "index")  {
	
	
	$title = "Ubah Profil";
	
	$sql 	= mysqli_query($conn, "SELECT * FROM member where member.username='$username'");
	$hasil 	= mysqli_fetch_array($sql);
	$username 	= $hasil['username'];
	$alamat_order 	= $hasil['password'];
	$no_telp 	= $hasil['no_telp'];
	$nama_lengkap 	= $hasil['nama_lengkap'];
	$alamat 	= $hasil['alamat'];
	$id_member 	= $hasil['id_member'];
	
	
	include temp."header.php";	
	include "view/$page.php";
	include temp."footer.php";
	

} 

else if ($sub == "save")  {
	
	
	$id_member = $_POST['id_member'];
	$nama_lengkap = $_POST['nama_lengkap'];
	$no_telp = $_POST['no_telp'];
	$alamat = $_POST['alamat'];
	
	$user_ganti = $_POST['username'];
	$pass_ganti = $_POST['password'];
	
	
	$query 	= "UPDATE member SET
							nama_lengkap	= '$nama_lengkap',
							no_telp  	  	= '$no_telp',
							alamat 	 	 	= '$alamat',
							username		= '$user_ganti',
							password	 	= '$pass_ganti'
							where id_member  = '$id_member'";
			$sql = mysqli_query($conn, $query); 
	
	if ($username != $user_ganti) {
		$_SESSION['sukses'] = "<strong>Username Diubah! harap login! lagi</strong>";	
		header('location:'.$link.'/login/logout');
	} else {
	
		
			

			if ($sql == true) 
			{	
				$_SESSION['sukses'] = "<strong>Profil Berhasil Diubah!</strong>";	
				header('location:'.$link.'/profil');
			}
			else{
				$error =  "Error updating record: " . mysqli_error($conn);
				$_SESSION['salah'] = "<strong>Profil gagal Diubah!</strong><br>
				$error
				";
				header('location:'.$link.'/profil');
				
			}
	}
	
}

?>
