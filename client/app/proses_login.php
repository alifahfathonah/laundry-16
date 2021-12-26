<?php




if ($sub == "index")  {
	
	if (isset($_SESSION['username']) and isset($_SESSION['level']) ) {
		header('location:'.$link.'/home');
	}	
	
	

	include "view/$page.php";
}	

else if ($sub == "post")  {
	
	
	
		$username = $_POST['username'];
		$pass     = $_POST['password'];

		$login=mysqli_query($conn, "SELECT * FROM member WHERE username='$username' AND password='$pass'");
		$ketemu=mysqli_num_rows($login);
		$r=mysqli_fetch_array($login);

		// Apabila username dan password ditemukan
		if ($ketemu > 0){
		  
		  $aktif     = $r['aktif'];
		
			// Apabila akun diaktifkan
		  if ($aktif > 0){
		 
			
		  $_SESSION['username']     = $r['username'];
		  $_SESSION['nama_lengkap']  = $r['nama_lengkap'];
		  $_SESSION['password']     = $r['password'];
		  $_SESSION['level']    = $r['level'];
		  
		  header('location:'.$link.'/home');
		  
		  } else {
			  $_SESSION['akun'] = "<strong>Akun Anda Belum Aktif!</strong> Harap sabar menunggu!!";
			header('location:'.$link.'/login');
		  }
		}
		else{
			$_SESSION['salah'] = "<strong>Gagal Login!</strong> Username dan Password salah!!";
			header('location:'.$link.'/login');
			
		}
	

	
}



else if ($sub == "register")  {
	
	
	include "view/$sub.php";
}	





else if ($sub == "save")  {
	
		$nama_lengkap = $_POST['nama_lengkap'];
		$no_telp = $_POST['no_telp'];
		$alamat = $_POST['alamat'];
		$username = $_POST['username'];
		$password     = $_POST['password'];

		//tambah member
		$query 	= "INSERT member SET
						nama_lengkap  = '$nama_lengkap',
						no_telp 	  = '$no_telp',
						alamat 		  = '$alamat',
						username 	  = '$username',
						password 	  = '$password',
						level 		  = 'member',
						aktif 		  = '0'";
		$sql = mysqli_query($conn, $query); 
		

		if ($sql == true) 
		{	
			$_SESSION['sukses'] = "<strong>Berhasil Daftar!</strong> Silahkan tunggu 1x24 jam untuk kami aktifkan akun Anda agar bisa login.";	
			header('location:'.$link.'/login/register');
		}
		else{
			$_SESSION['salah'] = "<strong>Gagal Daftar!</strong> Input ulang lagi!!";
			header('location:'.$link.'/login/register');
			//echo "Error updating record: " . mysqli_error($conn);
		}
	

	
}	


else if ($sub == "logout") {
	
	session_destroy(); 
	header('location:'.link);
}	
?>
