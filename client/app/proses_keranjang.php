<?php

include "proses_auth.php";

if ($sub == "index")  {
	
	
	$title = "Keranjang Laundry";
	
	$sql 	= mysqli_query($conn, "SELECT * FROM order_laundry where username='$username' and (status = 0 or status = 3) ");
	$hasil 	= mysqli_fetch_array($sql);
	$order_id 	= $hasil['order_id'];
	$status 	= $hasil['status'];
	
	
	$sql_cek 	= mysqli_query($conn, "SELECT * FROM order_detail where order_id='$order_id' and jenis = 'pcs'");
	$h 	= mysqli_fetch_array($sql_cek);
	$layanan_pcs 	= $h['layanan_pcs'];
	
	
	$query = mysqli_query($conn, "SELECT * FROM  order_detail, paket WHERE order_detail.order_id = '$order_id' AND order_detail.id_paket=paket.id_paket AND jenis = 'kiloan'");
		
		
	$query2 = mysqli_query($conn, "SELECT * FROM order_detail, item WHERE order_detail.order_id = '$order_id' AND order_detail.id_item=item.id_item AND jenis = 'pcs'");
		
	$sql_total = mysqli_query($conn, "SELECT sum(price) as grand_total FROM order_detail WHERE 
	order_id = '$order_id' ");
	$hasil 	= mysqli_fetch_array($sql_total);
	$grand_total 	= $hasil['grand_total'];
	
	include temp."header.php";
	if ($status == 3) {
		include "view/rollback.php";	
	} else {
		include "view/$page.php";
	}
	include temp."footer.php";
	
}	


if ($sub == "change")  {
	
	
	
	$query 	= "UPDATE order_laundry SET
					status 	  = '3'
					where order_id  	  = '$id'";
	$sql = mysqli_query($conn, $query); 
	

	if ($sql == true) 
	{	
		$_SESSION['sukses'] = "<strong>Rollback Berhasil!</strong>";	
		header('location:'.$link.'/keranjang');
	}
	else{
		$error =  "Error updating record: " . mysqli_error($conn);
		$_SESSION['salah'] = "<strong>Rollback  gagal </strong><br>
		$error
		";
		header('location:'.$link.'/keranjang');
		
	}
	
}	





else if ($sub == "edit")  {

	
	$jumlah = $_POST['jumlah'];
	$id_paket = $_POST['id_paket'];
	
	if ($jumlah < 1) {
		$_SESSION['salah'] = "<strong>Tidak Boleh kurang dari 1!</strong>";
		header('location:'.$link.'/keranjang');
		exit;
	} else {
		if ($id_paket == 4 || $id_paket == 3) {
			if ($jumlah < 4) {
				$_SESSION['salah'] = "<strong>Tidak Boleh kurang dari 4!</strong>";
				header('location:'.$link.'/keranjang');
				exit;
			}
		} else if ($id_paket == 1 || $id_paket == 2) {
			if ($jumlah > 3) {
				$_SESSION['salah'] = "<strong>Tidak Boleh lebih dari 4!</strong>";
				header('location:'.$link.'/keranjang');
				exit;
			}	
		}	
		
		
	$order_id = $_POST['order_id'];
	$id = $_POST['id'];
	$harga = $_POST['harga'];
	if (isset($_POST['layanan_pcs'])) {
		$layanan_pcs = $_POST['layanan_pcs'];
		if ($layanan_pcs == 'kilat') {
	
		$price = $jumlah * $harga * 2;
	
		} else {
			$price = $jumlah * $harga;
		}
	} else {
			$price = $jumlah * $harga;
	}
	
	
	
	
			//ubah order detail
			$query2 	= "UPDATE order_detail SET
							qty		      = '$jumlah',
							price		  = '$price'
							where id  	  = '$id'";
			$sql = mysqli_query($conn, $query2); 
		

			if ($sql == true) 
			{	
				$_SESSION['sukses'] = "<strong>Berhasil Diedit!</strong>";	
				header('location:'.$link.'/keranjang');
			}
			else{
				$error =  "Error updating record: " . mysqli_error($conn);
				$_SESSION['salah'] = "<strong>Gagal Diedit!</strong><br>
				$error
				";
				header('location:'.$link.'/keranjang');
				
			}
			
	}

}


else if ($sub == "edit_pcs")  {

	$layanan = $_POST['layanan'];
	$order_id = $_POST['order_id'];
	
	
	$sql_cek 	= mysqli_query($conn, "SELECT * FROM order_detail where order_id='$order_id' and jenis = 'pcs'");
	
	while($row = mysqli_fetch_array($sql_cek)){
			
		$id 	= $row['id'];
		$price 	= $row['price'];
		$price_ganti = $row['price'];
		$layanan_pcs = $row['layanan_pcs'];
		if ($layanan == 'kilat' and $layanan_pcs == 'reguler') {
			$price_ganti = $price * 2;
		} else if ($layanan == 'reguler' and $layanan_pcs == 'kilat') {
			$price_ganti = $price / 2;
		}	
		
		
		//ubah order detail
		$query2 	= "UPDATE order_detail SET
						layanan_pcs		= '$layanan',
						price		  = '$price_ganti'
						where id  	  = '$id'";
		$sql = mysqli_query($conn, $query2); 
	}	

			if ($sql_cek == true) 
			{	
				$_SESSION['sukses'] = "<strong>Berhasil Diedit!</strong>";	
				header('location:'.$link.'/keranjang');
			}
			else{
				$error =  "Error updating record: " . mysqli_error($conn);
				$_SESSION['salah'] = "<strong>Gagal Diedit!</strong><br>
				$error
				";
				header('location:'.$link.'/keranjang');
				
			}
			
	

}


else if ($sub == "batal")  {
	
	
	
	$query          = "DELETE FROM order_detail WHERE order_id='$id'";
	$sql            = mysqli_query($conn, $query);
	
	$query2          = "DELETE FROM order_laundry WHERE order_id='$id'";
	$sql2            = mysqli_query($conn, $query2);
	

		if ($sql2) 
		{
			$_SESSION['sukses'] = "<strong>Transaksi Berhasil Dihapus!</strong>";	
			header('location:'.$link.'/keranjang');
		} 
		else
		{
			$error =  "Error updating record: " . mysqli_error($conn);
			$_SESSION['salah'] = "<strong>Order gagal Dihapus!</strong><br>
			$error
			";
			header('location:'.$link.'/keranjang');
		}


	

}



else if ($sub == "hapus")  {
	
	
	
	$query          = "DELETE FROM order_detail WHERE id='$id'";
	$sql            = mysqli_query($conn, $query);
	
	
	

		if ($sql) 
		{
			$_SESSION['sukses'] = "<strong> Berhasil Dihapus!</strong>";	
			header('location:'.$link.'/keranjang');
		} 
		else
		{
			$error =  "Error updating record: " . mysqli_error($conn);
			$_SESSION['salah'] = "<strong>Order gagal Dihapus!</strong><br>
			$error
			";
			header('location:'.$link.'/keranjang');
		}


	

}


else if ($sub == "selesai")  {
	
	
	$order_id = $_POST['order_id'];
	$grand_total = $_POST['grand_total'];
	$tanggal_masuk = date("Y-m-d H:i:s");
	$uang = $_POST['uang'];
	if ($uang <= $grand_total) {
		$uang_sisa = $grand_total - $uang;
		
		$query 	= "UPDATE order_laundry SET
						tanggal_masuk 	  	= '$tanggal_masuk',
						grand_total     	= '$grand_total',
						uang		 	  	= '$uang',
						status  			= '1'
						where order_id  	  = '$order_id'";
		$sql = mysqli_query($conn, $query); 
		

		if ($sql == true) 
		{	
			$_SESSION['order_id'] = $order_id;	
			$_SESSION['sukses'] = "<strong>Transaksi Selesai!</strong>";	
			header('location:'.$link.'/transaksi');
		}
		else{
			$error =  "Error updating record: " . mysqli_error($conn);
			$_SESSION['salah'] = "<strong>Transaksi gagal Dibuat!</strong><br>
			$error
			";
			header('location:'.$link.'/keranjang');
			
		}
		
	} else {
		$_SESSION['salah'] = "<strong>Transaksi gagal!</strong>";
			header('location:'.$link.'/keranjang');
	}
	

	
	

}


else if ($sub == "konfirmasi")  {
	
	
	$order_id = $_POST['order_id'];
	$nama = $_POST['nama'];
	$nama_struk = str_replace(" ","_",$nama);
			//upload foto_struk nya
			$allowed_ext  = array('jpg', 'jpeg', 'png');
			$file_name    = $_FILES['foto_struk']['name']; // File adalah name dari tombol input pada form
			$tmp			= explode('.', $file_name);
			$file_ext     = strtolower(end($tmp));
			$file_size    = $_FILES['foto_struk']['size'];
			$file_tmp     = $_FILES['foto_struk']['tmp_name'];
			
			//lokasi upload
			$lokasi       = '../admin/struk/'.$nama_struk.'-'.$order_id.'.'.$file_ext;
			$foto_struk   = $nama_struk.'-'.$order_id.'.'.$file_ext;
			
			
			if(in_array($file_ext, $allowed_ext) === true) {
				move_uploaded_file($file_tmp, $lokasi);
				
				//update status di transaksi 
				$query = "UPDATE order_laundry SET  status = 3, struk	= '$foto_struk'	
											WHERE   order_id = '$order_id'";	
				
				
		$sql = mysqli_query($conn, $query);
			
			

			if ($sql == true) 
			{	
				$_SESSION['order_id'] = $order_id;	
				$_SESSION['sukses'] = "<strong>Konfirmasi Pembayaran Selesai!</strong>";	
				header('location:'.$link.'/transaksi/list');
			}
			else{
				$error =  "Error updating record: " . mysqli_error($conn);
				$_SESSION['salah'] = "<strong>Transaksi gagal Dibuat!</strong><br>
				$error
				";
				header('location:'.$link.'/transaksi/list');
				
			}
		
		} else {
				$_SESSION['order_id'] = $order_id;		
				$_SESSION['salah'] = "<strong>Format file hanya JPG, JPEG, dan PNG!!</strong>";	
				header('location:'.$link.'/transaksi/detail/'.$order_id);
			}
		
	
	

	
	

}
?>
