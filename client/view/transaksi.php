<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Erbe Laundry</title>

      <!-- CSS Bootstrap -->
    <link href="<?=$link?>/css/bootstrap.css" rel="stylesheet">
    <link href="<?=$link?>/css/custom.css" rel="stylesheet">
     <!-- CSS datepicker -->
	<link href="<?=$link?>/datepicker/css/datepicker.css" rel="stylesheet">
		
		<link rel="icon" href="<?=$link?>/images/icon.png">
		
		
		 
		
		 
        
		 <style>
		 .navbar-toggle:hover {
			 text-decoration:none;
		 }
		 </style>
		
		
       
		
        
    </head>
    <body >
	

       
<div class="badan"   >
<?php		
 $count = mysqli_num_rows($query);
	  $count2 = mysqli_num_rows($query2);
?>	  
<div class="container" >
     
	
	<?php if (isset($_SESSION['sukses'])) { ?>	
		<div  class="alert alert-success"><?php echo  $_SESSION['sukses']; ?> </div>				
		<?php unset($_SESSION['sukses']); }	 ?>			
		
	<?php if (isset($_SESSION['salah'])) { ?>			
		<div  class="alert alert-danger"> <?php echo  $_SESSION['salah']; ?></div>	
		<?php unset($_SESSION['salah']); } 	?>	
	
	

	
     
	  
			
      <div class="panel panel-primary" ng-repeat="data2 in transaksi_data">
					<div class="panel-heading text-center" >
					<b>Nota Transaksi NO. <?=$order_id?></b>
					</div>
					<div class="panel-body">
					
					<p class="text-center" style="font-size:12px" >
						<b>Silahkan Anda Screen Shoot Transaksi ini</b>
						</p>
					
					<table class="table_less" style="font-size:12px">
					<tr>
					<td width="70px">Username </td>
					<td>: <?=$username?> </td>
					</tr>
					
					<tr>
					<td>Alamat </td>
					<td>: <?=$alamat_order?> </td>
					</tr>
					
					<tr>
					<td>No.Telpon </td>
					<td>: <?=$no_telp ?>  </td>
					</tr>
					
					<tr>
					<td>Tanggal Masuk </td>
					<td>: <?=$tanggal_masuk ?>  </td>
					</tr>
					</table>
					<table  class="table" style="font-size:12px">
					
<?php if ($count > 0) {  ?>
					<tr ><th colspan="4">Laundry Kiloan</th></tr>
<?php } ?>  
						
					<?php 
					while($r = mysqli_fetch_array($query)){	
					?>	
						<tr>
							<td width="100px"><?=$r['nama_paket']?></td>
							<td><?="Rp ".number_format($r['harga'])?></td>
							<td width="40px"><?=$r['qty']?> Kg</td>
							<td><?="Rp ".number_format($r['price'])?></td>
						</tr>
						<?php }  ?>

<?php if ($count2 > 0) {  ?>
					<tr ><th colspan="4">Laundry Pcs</th></tr>
<?php } ?>  
						
					<?php 
					while($r = mysqli_fetch_array($query2)){	
					?>	
						<tr>
							<td width="130px"><?=$r['item_name']?> </td>
							<td><?="Rp ".number_format($r['harga'])?></td>
							<td width="40px"><?=$r['qty']?> Kg</td>
							<td><?="Rp ".number_format($r['price'])?> (<?=$r['layanan_pcs']?>)</td>
						</tr>
						<?php }  ?>						
						<tfoot>
						<tr>
							<td colspan="3" class="text-right">Grand Total:</td>
							<td><b><?php echo "Rp ".number_format($grand_total) ?></b></td>
						</tr>
						<tr>
							<td colspan="3" class="text-right">Uang:</td>
							<td><b><?php echo "Rp ".number_format($uang) ?></b></td>
						</tr>
						
						</tfoot>
						</table>
						
						<p class="alert alert-success text-justify" style="font-size:12px" >
						Terima Kasih! Kurir Kami akan menghubungi Anda dan datang ke lokasi yang Anda tentukan tadi lalu menimbang ulang Laundry Kiloan Anda.
						</p>
						
						
						<a style="cursor:pointer" href="<?=$link?>/home" class="btn btn-primary"><span class="glyphicon glyphicon-home" ></span>  &nbsp; Kembali ke Home</a>
				</div>
				<br>
				<div class="panel-footer">Copyright &copy; Erbe Laundry</div>
			</div>
	  
					
	


 







 
 
 
 
 
 