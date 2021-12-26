  
<div class="container" >
     
		
    
		
		<div class="form-group">
		<a href="<?=$link?>/order/edit" class="btn btn-warning"><span class="glyphicon glyphicon-arrow-left" ></span>  &nbsp; back</a>
		
		</div>
		
				
		
		
<div class="container  kotak0"  style="">
  
  
  
	<div class="row">
		
	
	
	<table class="table_less text-left"  style="border-bottom:1px solid #69b0d4;border-top:1px solid #69b0d4;">
					<tr>
					<th class="text-center" colspan="3" style="border-bottom:1px solid #69b0d4;">Order ID <?=$order_id?> </th>
					</tr>
					<tr>
					<th width="80px">Username </th>
					<td>: </td>
					<td><?=$username?> </td>
					</tr>
					
					<tr>
					<th>Alamat Order</th>
					<td>: </td>
					<td><?=$alamat_order?> </td>
					</tr>
					</table>
	  	
		
  
      <div class="col-xs-12 kotak" >
        <div class="thumbnail" >
          
		 
		  <center class="kotak2" style="">
		  
          <h4>Laundry Paket Kiloan</h4>
		  <div class="garis"></div>
		  </center>
		  <br>
		 <div class="list-group ">
		 <?php
					while($r = mysqli_fetch_array($sql)){	
						
					$ada = "ada";
				
						
					?>		
    <a href="<?=$link?>/order/ambil_paket/<?=$r['id_paket']?>" class="list-group-item" style="margin-bottom:10px">
      <h4 class="list-group-item-heading"><?=$r['nama_paket']?></h4>
      <p class="list-group-item-text"><?="Rp ".number_format($r['harga'])?></p>
    </a>
    <?php 
					} if ($ada != "ada") {
					?>	
						
							<h5>TIDAK ADA DATA</h5>
						
					<?php } ?>	
  </div>
		  
		  
        </div>
      </div>
	  
	  
	  
	  <div class="col-xs-12 kotak" >
        <div class="thumbnail" >
          
		 
		  <center class="kotak2" style="">
		  
          <h4>Laundry Item Pcs</h4>
		  <div class="garis"></div>
		  </center>
		  <br>
		 <div class="list-group ">
		 <?php
					while($row = mysqli_fetch_array($sql2)){	
						
					$ada = "ada";
				
						
					?>		
    <a href="<?=$link?>/order/ambil_item/<?=$row['id_item']?>" class="list-group-item" style="margin-bottom:10px">
      <h4 class="list-group-item-heading"><?=$row['item_name']?> <small style="color:#000">(<?=$row['type']?>)</small></h4>
      <p class="list-group-item-text"><?="Rp ".number_format($row['harga'])?></p>
    </a>
    <?php 
					} if ($ada != "ada") {
					?>	
						
							<h5>TIDAK ADA DATA</h5>
						
					<?php } ?>	
  </div>
		  
		  
        </div>
      </div>
	  
	   
	
	</div>
	
</div>
 


</div>





 
 
 
 
 
 