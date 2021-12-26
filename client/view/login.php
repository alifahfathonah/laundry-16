
<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Erbe Laundry</title>

      <!-- CSS Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    
		
		<link rel="icon" href="images/icon.png">
		
		
		 
		
		 
		 
		 
		 
		
		
       
		
        
    </head>
    <body class="body_login">

      

<center>
	 <img src="images/logo.png" class="img responsive" style="width:200px;margin-bottom:20px"/>
	</center>	
 
<div class="container" >

 
			
		<br>
				<div class="panel panel-primary">
					<div class="panel-heading text-center">Login Customer</div>
					<div class="panel-body">
						<!--User Login Form-->
						
					<form  name="login" action="<?=$link?>/login/post" method="POST" >
		
		<?php if (isset($_SESSION['salah'])) { ?>			
		<div  class="alert alert-danger"> <?php echo  $_SESSION['salah']; ?></div>	
		<?php unset($_SESSION['salah']); } 	?>
		
		<?php if (isset($_SESSION['sukses'])) { ?>	
		<div  class="alert alert-success"><?php echo  $_SESSION['sukses']; ?> </div>				
		<?php unset($_SESSION['sukses']); }	 ?>
		
		<?php if (isset($_SESSION['akun'])) { ?>	
		<div class="alert alert-warning"><?php echo  $_SESSION['akun'];?> </div>	
		<?php 	unset($_SESSION['akun']);  }?>
		
	
	  <div class="form-group has-feedback">
       
        <input required  name="username" type="text" placeholder="Username"  class="form-control" autofocus>
        <span  class="glyphicon glyphicon-user form-control-feedback"></span>
		
      </div>
      <div class="form-group has-feedback">
        <input akun  name="password" type="password" placeholder="Password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
		
      </div>
	  <small >Lupa Password? Klik <a class="btn btn-primary btn-xs " href="lupa_pass.html">Disini</a></small>
	  <br>
	  <br>
		 <button type="submit" name="login" class="btn btn-primary btn-block ">Log In</button>			
		 
		<div style="border-bottom:2px solid #ddd;margin-top:10px" class="text-center">Atau</div>
		
		<br>	
		 <a href="login/register" class="btn btn-success btn-block ">Register</a>			
					
	</form>

				</div>
				<br>
				<div class="panel-footer">Copyright &copy; Erbe Laundry</div>
			</div>
		
		
	</div>
         
		   

	   
	
	
	
</div>



	
	
	
	


 
      
	  
	   <script src="js/jquery.js"></script>
	   
    <script src="js/bootstrap.min.js"></script>
	
	<script>
$(document).ready(function(){
	$(".alert").delay('3000').fadeOut();
     
});
</script>
    </body>
</html>


  
