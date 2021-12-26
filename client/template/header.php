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
	

       <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <a href="<?=$link?>/login/logout" class="navbar-toggle" style="color:#fff;padding:6px 10px 6px 10px;">
       <span class="glyphicon glyphicon-log-out" ></span>
      </a>
		 <a href="<?=$link?>/keranjang"  class="navbar-toggle"  style="color:#fff;padding:6px 10px 6px 10px;" id="button2">
        <span class="glyphicon glyphicon-shopping-cart"></span>
		<?php if ($jumlah_keranjang > 0) { ?>
		<span class="label label-danger"><?=$jumlah_keranjang?></span>
		<?php } ?>
      </a>
	  
	 
      <a class="navbar-brand" href=""><?=$title;?></a>
    </div>

    
	
	
  </div>
</nav>

<div class="badan"   >