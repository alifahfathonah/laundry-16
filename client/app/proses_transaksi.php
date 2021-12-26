<?php

include "proses_auth.php";

if ($sub == "index")  {
	
	if (isset($_SESSION['order_id'])) {
		$order_session = $_SESSION['order_id'];
	}
	
	$title = "Transaksi Laundry Selesai";
	
	$sql 	= mysqli_query($conn, "SELECT * FROM order_laundry, member where member.username='$username' and order_laundry.order_id = '$order_session' and order_laundry.username = member.username");
	$hasil 	= mysqli_fetch_array($sql);
	$order_id 	= $hasil['order_id'];
	$username 	= $hasil['username'];
	$alamat_order 	= $hasil['alamat_order'];
	$tanggal_masuk 	= $hasil['tanggal_masuk'];
	$no_telp 	= $hasil['no_telp'];
	$uang 	= $hasil['uang'];
	
	
	$query = mysqli_query($conn, "SELECT * FROM  order_detail, paket WHERE order_detail.order_id = '$order_id' AND order_detail.id_paket=paket.id_paket AND jenis = 'kiloan'");
		
		
	$query2 = mysqli_query($conn, "SELECT * FROM order_detail, item WHERE order_detail.order_id = '$order_id' AND order_detail.id_item=item.id_item AND jenis = 'pcs'");
		
	$sql_total = mysqli_query($conn, "SELECT sum(price) as grand_total FROM order_detail WHERE 
	order_id = '$order_id' ");
	$hasil 	= mysqli_fetch_array($sql_total);
	$grand_total 	= $hasil['grand_total'];
		
	include "view/$page.php";
	include temp."footer.php";
	

} 


else if ($sub == "list")  {
	$title = "Daftar Transaksi";
	
	$query 	= mysqli_query($conn, "SELECT * FROM order_laundry, member where member.username='$username' and status >= 1 and order_laundry.username = member.username");
	
	
	include temp."header.php";
	include "view/$sub.php";
	include temp."footer.php";
}

else if ($sub == "detail")  {
	
	
	$title = "Transaksi Detail";
	
	$sql 	= mysqli_query($conn, "SELECT * FROM order_laundry, member where order_laundry.order_id='$id' and order_laundry.username = member.username");
	$hasil 	= mysqli_fetch_array($sql);
	$order_id 	= $hasil['order_id'];
	$username 	= $hasil['username'];
	$alamat_order 	= $hasil['alamat_order'];
	$tanggal_masuk 	= $hasil['tanggal_masuk'];
	$no_telp 	= $hasil['no_telp'];
	$uang 	= $hasil['uang'];
	$status 	= $hasil['status'];
	
	
	$query = mysqli_query($conn, "SELECT * FROM  order_detail, paket WHERE order_detail.order_id = '$order_id' AND order_detail.id_paket=paket.id_paket AND jenis = 'kiloan'");
		
		
	$query2 = mysqli_query($conn, "SELECT * FROM order_detail, item WHERE order_detail.order_id = '$order_id' AND order_detail.id_item=item.id_item AND jenis = 'pcs'");
		
	$sql_total = mysqli_query($conn, "SELECT sum(price) as grand_total FROM order_detail WHERE 
	order_id = '$order_id' ");
	$hasil 	= mysqli_fetch_array($sql_total);
	$grand_total 	= $hasil['grand_total'];
		
	include temp."header.php";
	include "view/$sub.php";
	include temp."footer.php";
	

} 

else if ($sub == "ambil")  {
	
	$order_id = $_GET['a'];
	
	$query 	= "UPDATE order_detail SET
					status_laundry 	  = '2'
					where id  	  = '$id'";
	$sql = mysqli_query($conn, $query); 
	

	if ($sql == true) 
	{	
		$_SESSION['sukses'] = "<strong>Laundry Akan Diambil oleh Kurir!</strong>";	
		header('location:'.$link.'/transaksi/detail/'.$order_id);
	}
	else{
		$error =  "Error updating record: " . mysqli_error($conn);
		$_SESSION['salah'] = "<strong>Proses gagal Diedit!</strong><br>
		$error
		";
		header('location:'.$link.'/transaksi/detail/'.$order_id);
		
	}
	

} 
?>
