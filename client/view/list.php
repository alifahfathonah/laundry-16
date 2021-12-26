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
  
<div class="container" >
     
	
	<?php if (isset($_SESSION['sukses'])) { ?>	
		<div  class="alert alert-success"><?php echo  $_SESSION['sukses']; ?> </div>				
		<?php unset($_SESSION['sukses']); }	 ?>			
		
	<?php if (isset($_SESSION['salah'])) { ?>			
		<div  class="alert alert-danger"> <?php echo  $_SESSION['salah']; ?></div>	
		<?php unset($_SESSION['salah']); } 	?>	
	
	<div class="form-group">
		<a href="<?=$link?>/home" class="btn btn-warning"><span class="glyphicon glyphicon-arrow-left" ></span>  &nbsp; back</a>
		
		</div>

	
     <?php 
					while($r = mysqli_fetch_array($query)){	
					?>	
	  
			
      <div class="panel panel-primary" ng-repeat="data2 in transaksi_data">
					<div class="panel-heading text-center" >
					<b>Nota Transaksi NO. <?=$r['order_id']?></b>
					</div>
					<div class="panel-body">
					
					
					<table class="table" style="font-size:12px">
					
					<tr>
					<td>Alamat Order</td>
					<td colspan="4">: <?=$r['alamat_order']?></td>	
					</tr>
					
					<tr>
					<td>No.Telpon </td>
					<td>: <?=$r['no_telp']?> </td>
					<td>Status</td>
					<td>: <?php if ($r['status'] == "1")  { ?>
						  <span class="label label-warning" style="font-size:10px">Belum Lunas</span>
						
						<?php } else if ($r['status'] == "3") { ?>
						  <span class="label label-danger"  style="font-size:10px">Diproses</span>
						
					
					<?php } else if ($r['status'] == "2") { ?>
						  <span class="label label-success"  style="font-size:10px">Lunas</span>
						<?php } ?> 
					
					
							 
					</td>
					
					</tr>
					
					
					<tr>
					<td >Tanggal Masuk </td>
					<td colspan="4">: <?=$r['tanggal_masuk']?> </td>
					
					</tr>
					
					
					
					</table>
					<div class="form-group">
		<a href="<?=$link?>/transaksi/detail/<?=$r['order_id']?>" class="btn btn-info"><span class="glyphicon glyphicon-arrow-right" ></span>  &nbsp; Detail</a>
		
		</div>
				</div>
				
			</div>
					<?php }
 $count = mysqli_num_rows($query); 
 if ($count < 1) { ?>
	       <div class="panel panel-primary" ng-repeat="data2 in transaksi_data">
					<div class="panel-heading text-center" >
					<b>Data Tidak Ada</b>
					</div>
					
				
			</div>
<?php
	 }
?>	


 







 
 
 
 
 
 