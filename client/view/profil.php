  
<div class="container" >
     
		
    
		
		<div class="form-group">
		<a href="<?=$link?>/home" class="btn btn-warning"><span class="glyphicon glyphicon-arrow-left" ></span>  &nbsp; back</a>
		
		</div>
		
				
		
		
	
	
<form  name="login" action="<?=$link?>/profil/save" method="POST" >
		
		<?php if (isset($_SESSION['salah'])) { ?>			
		<div  class="alert alert-danger"> <?php echo  $_SESSION['salah']; ?></div>	
		<?php unset($_SESSION['salah']); 	?>
		<?php }	?>
		
		
		<?php if (isset($_SESSION['sukses'])) { ?>	
		<div  class="alert alert-success"><?php echo  $_SESSION['sukses']; ?> </div>
		<?php unset($_SESSION['sukses']); 	?>				
		<?php }	?>
		
		<?php if (isset($_SESSION['error'])) { ?>	
		<div class="alert alert-warning"><?php echo  $_SESSION['error'];?> </div>	
		<?php unset($_SESSION['error']); 	?>
		<?php }	?>
		
	
	 <div class="form-group has-feedback">
		<label>Nama Lengkap</label>
        <input autofocus value="<?=$id_member?>" name="id_member" type="hidden" placeholder="Nama Lengkap"  class="form-control" required>
        <input autofocus value="<?=$nama_lengkap?>" name="nama_lengkap" type="text" placeholder="Nama Lengkap"  class="form-control" required>
        <span  class="glyphicon glyphicon-credit-card form-control-feedback"></span>
		
      </div>
	  
	  <div class="form-group has-feedback">
		<label>No. Telpon</label>
        <input  value="<?=$no_telp?>" name="no_telp" type="text" placeholder="No. HP"  class="form-control" required>
        <span  class="glyphicon glyphicon-phone form-control-feedback"></span>
		
      </div>
	  <div class="form-group has-feedback">
	    <label>Alamat</label>
        <input value="<?=$alamat?>" name="alamat" type="text" placeholder="Alamat"  class="form-control" required>
        <span  class="glyphicon glyphicon-list-alt form-control-feedback"></span>
		
      </div>
	   <div class="form-group has-feedback">
	    <label>Username</label>
        <input value="<?=$username?>" name="username" type="text" placeholder="Username"  class="form-control" required>
        <span  class="glyphicon glyphicon-user form-control-feedback"></span>
		
      </div>
      <div class="form-group has-feedback">
	    <label>Password</label>
        <input  value="<?=$password?>" name="password" type="password" placeholder="Password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
		
      </div>
	  
	  <div class="form-group ">
		 <button type="submit" name="register" class="btn btn-primary ">Simpan</button>
		 <button type="reset"  class="btn btn-warning ">Reset</button>			
	  </div>		
	</form>
	  
	   
	
	</div>
	





 
 
 
 
 
 