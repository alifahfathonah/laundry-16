
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
	
	
		<div class="form-group">
		<a href="<?=$link?>/transaksi/list" class="btn btn-warning"><span class="glyphicon glyphicon-arrow-left" ></span>  &nbsp; back</a>
		
		</div>
	
     
	  
			
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
					<tr ><th colspan="6">Laundry Kiloan</th></tr>
<?php } ?>  
						
					<?php 
					while($r = mysqli_fetch_array($query)){	
					?>	
						<tr>
							<td width="100px"><?=$r['nama_paket']?></td>
							<td><?="Rp ".number_format($r['harga'])?></td>
							<td width="40px"><?=$r['qty']?> Kg</td>
							<td><?="Rp ".number_format($r['price'])?></td>
							<td><?php if ($r['status_laundry'] == "0")  { ?>
						  <span class="label label-warning" style="font-size:10px">Diproses</span>
					<?php } else if ($r['status_laundry'] == "1") { ?>
						  <span class="label label-info" style="font-size:10px">Selesai</span>
					<?php } else if ($r['status_laundry'] == "2") { ?>
						  <span class="label label-success" style="font-size:10px">Diambil</span>
						<?php } ?> 
							 
					</td>
					<td>
			 <?php if ($r['status_laundry'] == "1")  { ?>
						  <a onclick="return confirm('Apa Anda Yakin ingin mengambil Laundry ini?')" class='btn btn-success btn-xs'  href="<?=$link?>/transaksi/ambil/<?=$r['id']?>&a=<?=$r['order_id']?>">Ambil</a>
					<?php } ?> 
			 </td>	
						</tr>
						<?php }  ?>

<?php if ($count2 > 0) {  ?>
					<tr ><th colspan="6">Laundry Pcs</th></tr>
<?php } ?>  
						
					<?php 
					while($r = mysqli_fetch_array($query2)){	
					?>	
						<tr>
							<td width="130px"><?=$r['item_name']?> </td>
							<td><?="Rp ".number_format($r['harga'])?></td>
							<td width="40px"><?=$r['qty']?> Kg</td>
							<td><?="Rp ".number_format($r['price'])?> (<?=$r['layanan_pcs']?>)</td>
							<td><?php if ($r['status_laundry'] == "0")  { ?>
						  <span class="label label-warning" style="font-size:10px">Diproses</span>
					<?php } else if ($r['status_laundry'] == "1") { ?>
						  <span class="label label-info" style="font-size:10px">Selesai</span>
					<?php } else if ($r['status_laundry'] == "2") { ?>
						  <span class="label label-success" style="font-size:10px">Diambil</span>
						<?php } ?> 
							 
					</td>
						<td>
			 <?php if ($r['status_laundry'] == "1")  { ?>
						  <a onclick="return confirm('Apa Anda Yakin ingin mengambil Laundry ini?')" class='btn btn-success btn-xs' href="<?=$link?>/transaksi/ambil/<?=$r['id']?>&a=<?=$r['order_id']?>">Ambil</a>
					<?php } ?> 
			 </td>	
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


<?php if ($status == "1") { ?>	
<form action="<?=$link?>/keranjang/konfirmasi" method="post" enctype="multipart/form-data" >
		<div class="form-group" >
		 <div class="garis" style=""></div>
			<h4>Konfirmasi Pembayaran ATM</h4>
			 <div class="garis" style=""></div>

			 <label class="col-xs-12 text-left" style="padding:15px 0px 5px 0px;">Upload Struk ATM</label>
			 <div class="col-xs-12  text-left" style="padding:0px 5px 5px 0px;">
			 <input required type="file" class="form-control" style="padding:0px" name="foto_struk" > 
			 
			 </div>
			 
			 <label class="col-xs-6 text-left" style="padding:15px 0px 10px 0px;">Pemilik Rekening</label>
			 <div class="col-xs-6  text-left" style="padding:10px 5px 10px 0px;">
			 <input required type="text" class="form-control" name="nama" > 
			 <input required type="hidden"  name="order_id"  value="<?=$order_id?>"> 
			
			 </div> 
		</div>
		<div class="form-group text-left" >
			<button onclick="return confirm('Apa Anda yakin untuk mengirimkan struk ATM ini?')" class="btn btn-md btn-success " style="cursor:pointer" type="submit" name="submit"><span class="glyphicon glyphicon-edit" ></span> Konfirmasi</button>
		</div>	
			
		</form>

					
<p class="text-center" style="font-size:12px" >
						<b>Edit, Jika ada perubahan jumlah / berat laundry Anda ketika ditimbang</b>
						</p>				
				<div class="form-group ">
				
					
		<a href="<?=$link?>/keranjang/change/<?=$order_id?>" class="btn btn-success"><span class="glyphicon glyphicon-edit" ></span>  &nbsp; Edit</a>
		
		</div>	
<?php } ?>		
				<br>
				<div class="panel-footer">Copyright &copy; Erbe Laundry</div>
			</div>
	  
					
	
</div>

 







 
 
 
 
 
 