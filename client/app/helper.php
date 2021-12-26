<?php



	$sql = "SELECT * FROM order_laundry, order_detail WHERE 
			order_laundry.order_id = order_detail.order_id AND
			order_laundry.username='$user_now' AND order_laundry.status = 0";
		$query = mysqli_query($conn, $sql);
		$jumlah_keranjang = mysqli_num_rows($query);
		
		
		
	
?>
