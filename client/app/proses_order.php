<?php

include "proses_auth.php";

if ($sub == "index")  {
	
	
	$title = "Order Laundry";
	
	
	include temp."header.php";
	include "view/$page.php";
	include temp."footer.php";
}	




else if ($sub == "next")  {
	
	
	
	
	
		//buat auto increment sendiri
		$query_ai = mysqli_query($conn, "SELECT * FROM order_laundry ORDER BY id DESC LIMIT 1");
		$jml_data_ai = mysqli_num_rows($query_ai);
		$hasil_ai 	= mysqli_fetch_array($query_ai);
		if ($jml_data_ai == 0) {
			$id = 1;
		} else {
			$id	= $hasil_ai['id'];	
		} 
		$id_ai = $id + 1;	
		
			$Latitude = $_POST['Latitude'];
			$Longitude = $_POST['Longitude'];
			
			$alamat_order = $_POST['alamat_order'];
		
			$year =date('y');
			$order_id = "NOTA$year-$id";

			//tambah member
			$query 	= "INSERT order_laundry SET
							id		  	  = '$id_ai',
							order_id  	  = '$order_id',
							username 	  = '$username',
							Latitude      = '$Latitude',
							Longitude 	  = '$Longitude',
							alamat_order  = '$alamat_order'";
			$sql = mysqli_query($conn, $query); 
			

			if ($sql == true) 
			{	
				$_SESSION['sukses'] = "<strong>Order Berhasil Dibuat!</strong>";	
				header('location:'.$link.'/order/pilih');
			}
			else{
				$error =  "Error updating record: " . mysqli_error($conn);
				$_SESSION['salah'] = "<strong>Order gagal Dibuat!</strong><br>
				$error
				";
				header('location:'.$link.'/order');
				
			}
	
	

	
}



else if ($sub == "pilih")  {
	
	
	$query_cek = mysqli_query($conn, "SELECT * FROM order_laundry WHERE (status = 0 or status = 3) AND username= '$username'");
	$cek = mysqli_num_rows($query_cek);
	if ($cek > 0) {
		$row 	= mysqli_fetch_array($query_cek);
		$alamat_order = $row['alamat_order'];
		$order_id = $row['order_id'];
		$username = $row['username'];
		
		
		$title = "Pilih Order Laundry";
	
		$ada = "";
		
		$ambil = "SELECT id_paket FROM order_detail where order_id = '$order_id'";
		$ambil2 = "SELECT id_item FROM order_detail where order_id = '$order_id'";

		$sql = mysqli_query($conn, "SELECT * FROM paket WHERE id_paket NOT IN ($ambil) ORDER BY id_paket DESC");
		$sql2 = mysqli_query($conn, "SELECT * FROM item WHERE id_item NOT IN ($ambil2) ORDER BY id_item DESC");
		
		include temp."header.php";
		include "view/$sub.php";
		include temp."footer.php";
		
	} else {
		header('location:'.$link.'/order');
	}	
	
	
	
}


else if ($sub == "edit")  {

	$query_cek = mysqli_query($conn, "SELECT * FROM order_laundry WHERE status = 0 AND username= '$username'");
	$cek = mysqli_num_rows($query_cek);
	if ($cek > 0) {
		$row 	= mysqli_fetch_array($query_cek);
		$alamat_order = $row['alamat_order'];
		$order_id = $row['order_id'];
		$username = $row['username'];
		$Latitude = $row['Latitude'];
		$Longitude = $row['Longitude'];
		
		
		$title = "Edir Order Laundry";
	
		$ada = "";
		
		
		
		include temp."header.php";
		include "view/order_$sub.php";
		include temp."footer.php";
		
	} else {
		header('location:'.$link.'/order');
	}	

}

else if ($sub == "proses_edit")  {

	$Latitude = $_POST['Latitude'];
	$Longitude = $_POST['Longitude'];
	
	$alamat_order = $_POST['alamat_order'];
	$order_id = $_POST['order_id'];
	$username = $_POST['username'];

	

	//tambah member
	$query 	= "UPDATE order_laundry SET
					username 	  = '$username',
					Latitude      = '$Latitude',
					Longitude 	  = '$Longitude',
					alamat_order  = '$alamat_order'
					where order_id  	  = '$order_id'";
	$sql = mysqli_query($conn, $query); 
	

	if ($sql == true) 
	{	
		$_SESSION['sukses'] = "<strong>Order Berhasil Diedit!</strong>";	
		header('location:'.$link.'/order/pilih');
	}
	else{
		$error =  "Error updating record: " . mysqli_error($conn);
		$_SESSION['salah'] = "<strong>Order gagal Diedit!</strong><br>
		$error
		";
		header('location:'.$link.'/order/edit');
		
	}
	

}

else if ($sub == "ambil_paket")  {

	
	
	//cek order_laundry
	$query_cek = mysqli_query($conn, "SELECT * FROM order_laundry WHERE (status = 0 or status = 3) AND username= '$username'");
	$cek = mysqli_num_rows($query_cek);
	if ($cek > 0) {
		$row 	= mysqli_fetch_array($query_cek);
		$order_id = $row['order_id'];
		
		$keranjang = "SELECT * FROM order_laundry WHERE status = 0 AND username= '$username'";
		
		//cek order_paket
		$query_paket = mysqli_query($conn, "SELECT * FROM paket WHERE id_paket = $id");
		$r 	= mysqli_fetch_array($query_paket);
		$id_paket 		= $r['id_paket'];	
		$nama_paket 	= $r['nama_paket'];
		$harga		 	= $r['harga'];
		
		
			
			if ($id == 4 or $id == 3) { $qty = 4; }
			else if ($id == 1 or $id == 2) { $qty = 1; }
			$price = $qty * $harga;
			//tambah order detail
			$query 	= "INSERT order_detail SET
							jenis	  	  = 'kiloan',
							order_id  	  = '$order_id',
							id_paket 	  = '$id_paket',
							qty		      = '$qty',
							price	 	  = '$price'";
			$sql = mysqli_query($conn, $query); 
			

			if ($sql == true) 
			{	
				$_SESSION['sukses'] = "<strong>Order Berhasil Dibuat!</strong>";	
				header('location:'.$link.'/keranjang');
			}
			else{
				$error =  "Error updating record: " . mysqli_error($conn);
				$_SESSION['salah'] = "<strong>Order gagal Dibuat!</strong><br>
				$error
				";
				header('location:'.$link.'/order/pilih');
				
			}
	
	} else {
		header('location:'.$link.'/order/pilih');
	}

}

else if ($sub == "ambil_item")  {

	//cek order_laundry
	$query_cek = mysqli_query($conn, "SELECT * FROM order_laundry WHERE (status = 0 or status = 3) AND username= '$username'");
	$cek = mysqli_num_rows($query_cek);
	if ($cek > 0) {
		$row 	= mysqli_fetch_array($query_cek);
		$order_id = $row['order_id'];
		
		$keranjang = "SELECT * FROM order_laundry WHERE status = 0 AND username= '$username'";
		
		//cek order_paket
		$query_item = mysqli_query($conn, "SELECT * FROM item WHERE id_item = $id");
		$r 	= mysqli_fetch_array($query_item);
		$id_item 		= $r['id_item'];	
		$item_name 		= $r['item_name'];
		$harga		 	= $r['harga'];
		$qty	=1; 
		
			
			$price = 1 * $harga;
			//tambah order detail
			$query 	= "INSERT order_detail SET
							jenis	  	  = 'pcs',
							layanan_pcs	  = 'reguler',
							order_id  	  = '$order_id',
							id_item 	  = '$id_item',
							qty		      = '$qty',
							price	 	  = '$price'";
			$sql = mysqli_query($conn, $query); 
			

			if ($sql == true) 
			{	
				$_SESSION['sukses'] = "<strong>Order Berhasil Dibuat!</strong>";	
				header('location:'.$link.'/keranjang');
			}
			else{
				$error =  "Error updating record: " . mysqli_error($conn);
				$_SESSION['salah'] = "<strong>Order gagal Dibuat!</strong><br>
				$error
				";
				header('location:'.$link.'/order/pilih');
				
			}
	
	} else {
		header('location:'.$link.'/order/pilih');
	}
	

}
?>
