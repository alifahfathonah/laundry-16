	<?php		
	 $count = mysqli_num_rows($query);
		  $count2 = mysqli_num_rows($query2);
		  $jum = mysqli_num_rows($sql);
	?>	  
	<div class="container" >
		 
		
		<?php if (isset($_SESSION['sukses'])) { ?>	
			<div  class="alert alert-success"><?php echo  $_SESSION['sukses']; ?> </div>				
			<?php unset($_SESSION['sukses']); }	 ?>			
			
		<?php if (isset($_SESSION['salah'])) { ?>			
			<div  class="alert alert-danger"> <?php echo  $_SESSION['salah']; ?></div>	
			<?php unset($_SESSION['salah']); } 	?>	
		
		

		
		  
	<?php if ($count != 0 or $count2 != 0)  { ?>	
			<a style="cursor:pointer" href="<?=$link?>/order/pilih" class="btn btn-warning"><span class="glyphicon glyphicon-arrow-left" ></span>  &nbsp;  Back</a>
	<?php } else  { ?>	
			<a style="cursor:pointer" href="<?=$link?>" class="btn btn-success"><span class="glyphicon glyphicon-home" ></span>  &nbsp;  Home</a>
	<?php } ?>			
	 <br><br>
			
	<div class="container text-center kotak0"  style="">
	  
	<div class="row">
	<?php if ($count > 0) {  ?>
	  <h4 style="border-bottom:1px solid #006da5; padding:5px">Laundry Kiloan</h4>
	<?php } ?>  
			
		  
		  <?php
		  
		  
						while($r = mysqli_fetch_array($query)){	
						
						?>			
		  <div class="col-xs-12 kotak" >
			<div class="thumbnail clearfix" >
			 
				<b class="nama_produk" style="display:block"><?=$r['nama_paket']?></b>
				 <div class="garis"></div>
			  
			   <div class="caption-full text-left">
			   <br/>
			<b>Harga</b>: <?="Rp ".number_format($r['harga'])?></a><br/>
			<b>Jumlah</b>: <?=$r['qty']?> Kg<br/>
			<b>Subtotal</b>:<?="Rp ".number_format($r['price'])?><br/>
			 <br>
			  </div>
			 
			 <div class="text-left" > 
			 <form action="<?=$link?>/keranjang/edit"  method="post">
				  <label class="col-xs-6" style="padding:15px 0px 5px 0px;">Jumlah yang Diubah </label>
				 
				 <div class="col-xs-6" style="padding:10px 5px 5px 0px;">
				 <input name="jumlah" class="form-control " value="<?=$r['qty']?>">
				
				 <input name="order_id" type="hidden" value="<?=$r['order_id']?>">
				 <input name="id" type="hidden" value="<?=$r['id']?>" >
				 <input name="id_paket" type="hidden" value="<?=$r['id_paket']?>" >
				 <input name="harga" type="hidden" value="<?=$r['harga']?>" >
				 </div>
				 
				 <div class="col-xs-12" style="padding:10px 0px 10px 0px">
				<button class="btn btn-md btn-primary " style="cursor:pointer" type="submit" name="edit"><span class="glyphicon glyphicon-edit" ></span> Update</button>
				 <a class="btn btn-md btn-danger " style="cursor:pointer" href="<?=$link?>/keranjang/hapus/<?=$r['id']?>"><span class="glyphicon glyphicon-trash" ></span> Hapus</a>
				 </div>
			</form>
			
			</div>
		  </div>
		  
		   </div>
		  
						<?php }  ?>
		
	<?php if ($count2 > 0) {  ?>	
	<h4 style="border-bottom:1px solid #006da5; padding:5px">Laundry Pcs</h4>
		
			<form action="<?=$link?>/keranjang/edit_pcs"   method="post">
			 <label class="col-xs-4" style="padding:15px 0px 5px 0px;">Layanan</label>
				 
				 <div class="col-xs-6" style="padding:10px 5px 5px 0px;">
				  <select class="form-control" name="layanan">
				<option value="reguler" <?php if ($layanan_pcs == 'reguler') echo 'selected' ?> >Reguler 3 hari</option>
				<option value="kilat"  <?php if ($layanan_pcs == 'kilat') echo 'selected' ?>  >Kilat 6 jam</option>
			  </select>
			   <input name="order_id" type="hidden" value="<?=$order_id?>">
				 </div>	
	 <div class="col-xs-1" style="padding:10px 5px 5px 0px;">
				 <button class="btn btn-md btn-primary " style="cursor:pointer" type="submit" name="edit"><span class="glyphicon glyphicon-edit" ></span></button>
				 </div>
			</form>		
				 <?php }  ?>
						<?php while($row = mysqli_fetch_array($query2)){	
						
						?>			
		  <div class="col-xs-12 kotak" >
			<div class="thumbnail clearfix" >
			 
				<b class="nama_produk" style=""><?=$row['item_name']?></b>
				 <div class="garis"></div>
			  
			   <div class="caption-full text-left">
			   <br/>
			<b>Type</b>: <?=$row['type']?><br/>
			<b>Layanan</b>: <?=$row['layanan_pcs']?><br/>
			<b>Harga</b>: <?="Rp ".number_format($row['harga'])?><br/>
			<b>Jumlah</b>: <?=$row['qty']?> Buah<br/>
			<b>Subtotal</b>:<?="Rp ".number_format($row['price'])?><br/>
			 <br>
			  </div>
			 
			 <div class="text-left" > 
			 <form action="<?=$link?>/keranjang/edit"   method="post">
			 
				
				 
				 
				  <label class="col-xs-6" style="padding:15px 0px 5px 0px;">Jumlah yang Diubah </label>
				 
				 <div class="col-xs-6" style="padding:10px 5px 5px 0px;">
				 <input name="jumlah" class="form-control " value="<?=$row['qty']?>">
				
				 <input name="order_id" type="hidden" value="<?=$row['order_id']?>">
				 <input name="layanan_pcs" type="hidden" value="<?=$layanan_pcs?>">
				 <input name="id_paket" type="hidden" value="<?=$row['item_name']?>">
				 <input name="id" type="hidden" value="<?=$row['id']?>" >
				 <input name="harga" type="hidden" value="<?=$row['harga']?>" >
				 </div>
				 
				 <div class="col-xs-12" style="padding:10px 0px 10px 0px">
				 <button class="btn btn-md btn-primary " style="cursor:pointer" type="submit" name="edit"><span class="glyphicon glyphicon-edit" ></span> Update</button>
				 <a class="btn btn-md btn-danger " style="cursor:pointer" href="<?=$link?>/keranjang/hapus/<?=$row['id']?>"><span class="glyphicon glyphicon-trash" ></span> Hapus</a>
				 </div>
			</form>
			</div>
			
			
			</div>
		  </div>
						<?php 
						
						} ?>
				
		  
		  
		  <?php 
		 
		  $sum = $count + $count2;
		  if ($sum  == 0) { ?>
					<div class="col-md-12 dialog">
						<div class="alert alert-danger">Keranjang tidak ada!!</div>
					</div>
				</div>
		  <?php } else { ?>	  
		  <div class="col-xs-12 ">
		  <div class="form-group " >
				 
			<form action="<?=$link?>/keranjang/selesai"   method="post">	 
				 <label class="col-xs-6" style="padding:15px 0px 10px 5px;text-align:left">Uang</label>
				 
				 <div class="col-xs-6" style="padding:10px 0px 10px 0px;">
				 <input required name="uang" type="text" class="form-control" placeholder="Input Uang">
				 </div>	
				 
				 <label class="col-xs-6" style="padding:15px 0px 10px 5px;text-align:left">Grand Total</label>
				 
				 <div class="col-xs-6" style="padding:10px 0px 10px 0px;">
				  <input name="order_id" type="hidden" readonly class="form-control" value="<?=$order_id?>">
				 <h4><?php echo "Rp ".number_format($grand_total) ?></h4>
				 <input name="grand_total" type="hidden" readonly class="form-control" value="<?php echo $grand_total ?>" >
				 </div>	
		</div>			
			<div class="form-group" >
				
				 <a class="btn btn-md btn-success " data-toggle="modal" style="cursor:pointer" href="#selesai"><span class="glyphicon glyphicon-edit" ></span> Selesaikan</a>
				 <a class="btn btn-md btn-danger " data-toggle="modal" style="cursor:pointer" href="#batal" ><span class="glyphicon glyphicon-trash" ></span> Batalkan</a>
				 
				 <div class="modal fade" id="batal" role="dialog">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">                    
										<div class="modal-body text-center">
											<h1><i class="fa fa-exclamation-triangle"></i></h1>
											<p>Apakah Anda yakin ingin membatalkan transaksi ini?</p>
											<div class="form-group">
												<a  href="<?=$link?>/keranjang/batal/<?=$order_id?>" class="btn btn-success">
													<i class="fa fa-check"></i>&nbsp;&nbsp;<b>YA</b>
												</a>
												<a data-dismiss="modal" class="btn btn-danger">
													<i class="fa fa-close"></i>&nbsp;&nbsp;<b>TIDAK</b>
												</a>
											</div>
										</div>
										
									</div>
								</div>
							</div>
							
					<div class="modal fade" id="selesai" role="dialog">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">                    
										<div class="modal-body text-center">
											<h1><i class="fa fa-exclamation-triangle"></i></h1>
											<p>Apakah Anda yakin ingin selesaikan transaksi ini?</p>
											<div class="form-group">
												<button  type="submit" name="selesai" class="btn btn-success">
													<i class="fa fa-check"></i>&nbsp;&nbsp;<b>YA</b>
												</button>
												<a data-dismiss="modal" class="btn btn-danger">
													<i class="fa fa-close"></i>&nbsp;&nbsp;<b>TIDAK</b>
												</a>
											</div>
										</div>
										
									</div>
								</div>
							</div>		
				 </div>	
				 </div>	
		</form>	
		  <?php } ?>		 
			
			
			
		</div>
		</div>
		

		  <hr/>

	 







	 
	 
	 
	 
	 
	 