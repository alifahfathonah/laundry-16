
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
    
		
		<link rel="icon" href="<?=$link?>/images/icon.png">
		
		
		 
		
		 
		 
		 
		 
		
		
       
		
        
    </head>
    <body class="body_login">

      

<center>
	 <img src="<?=$link?>/images/logo.png" class="img responsive" style="width:200px;margin-bottom:20px"/>
	</center>	
 
<div class="container" >

 
			
		<br>
				<div class="panel panel-primary">
					<div class="panel-heading text-center">Register Customer</div>
					<div class="panel-body">
						<!--User Login Form-->
						
					<form  name="login" action="<?=$link?>/login/save" method="POST" >
		
		<?php if (isset($_SESSION['salah'])) { ?>			
		<div  class="alert alert-danger"> <?php echo  $_SESSION['salah']; ?></div>	
		<?php unset($_SESSION['salah']); } 	?>
		
		<?php if (isset($_SESSION['sukses'])) { ?>	
		<div  class="alert alert-success"><?php echo  $_SESSION['sukses']; ?> </div>				
		<?php unset($_SESSION['sukses']); } 	?>
		
		<?php if (isset($_SESSION['error'])) { ?>	
		<div class="alert alert-warning"><?php echo  $_SESSION['error'];?> </div>	
		<?php unset($_SESSION['error']); } 	?>
		
	
	 <div class="form-group has-feedback">
        <input autofocus name="nama_lengkap" type="text" placeholder="Nama Lengkap"  class="form-control" required>
        <span  class="glyphicon glyphicon-credit-card form-control-feedback"></span>
		
      </div>
	  
	  <div class="form-group has-feedback">
        <input  name="no_telp" type="text" placeholder="No. HP"  class="form-control" required>
        <span  class="glyphicon glyphicon-phone form-control-feedback"></span>
		
      </div>
	  <div class="form-group has-feedback">
        <input  name="alamat" type="text" placeholder="Alamat"  class="form-control" required>
        <span  class="glyphicon glyphicon-list-alt form-control-feedback"></span>
		
      </div>
	   <div class="form-group has-feedback">
        <input  name="username" type="text" placeholder="Username"  class="form-control" required>
        <span  class="glyphicon glyphicon-user form-control-feedback"></span>
		
      </div>
      <div class="form-group has-feedback">
        <input   name="password" type="password" placeholder="Password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
		
      </div>
		 <button type="submit" name="register" class="btn btn-primary btn-block ">Simpan</button>			
		 
		<br>
		<div style="border-bottom:2px solid #ddd;" class="text-center">Atau</div>
		
		<br>	
		 <a href="<?=$link?>" class="btn btn-success btn-block ">Login</a>				
					
	</form>

				</div>
				<br>
				<div class="panel-footer">Copyright &copy; Erbe Laundry</div>
			</div>
		
		
	</div>
         
		   

	   
	
	
	
</div>



	
	
	
	


 
      
	  
	   <script src="<?=$link?>/js/jquery.js"></script>
	   
    <script src="<?=$link?>/js/bootstrap.min.js"></script>
	
	<script>
$(document).ready(function(){
	$(".alert").delay('3000').fadeOut();
     
});
</script>
    </body>
</html>


  
