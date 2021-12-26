  
<div class="container" >
     
		
    
		
		<div class="form-group">
		<a href="<?=$link?>/home" class="btn btn-warning"><span class="glyphicon glyphicon-arrow-left" ></span>  &nbsp; back</a>
		
		</div>
		
				
		
		
<div class="container  kotak0"  style="">
  
  
  
	<div class="row">
		
	
	
	
		
  
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
	  
	  
	  
	  
	  
	   
	
	</div>
	
</div>
 


</div>





 
 
 
 
 
 