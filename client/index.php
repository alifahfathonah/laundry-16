<?php 
ob_start();
session_start();
 
 
 
	//define the path of this application on your local disk
	define ("dir",__DIR__);

 
$length = strlen($_SERVER['PHP_SELF']);
$path	= substr($_SERVER['PHP_SELF'],0,$length-10);
define ("link","http://".$_SERVER['HTTP_HOST'].$path);
	$link = link;
	
include "../admin/config/koneksi.php";

//catch the menu
if (!isset($_GET['page']))
	$page = "";
else
	$page = $_GET['page'];

//catch the submenu
if (!isset($_GET['sub']))
	$sub = "index";
else
	$sub = $_GET['sub'];

// menentukan path template
define("temp", dir."/template/");
$temp = temp;

//catch the submenu
if (!isset($_GET['id']))
	$id = 0;
else
	$id = $_GET['id'];

//custom catch 
if (!isset($_GET['op']))
	$op = 0;
else
	$op = $_GET['op'];


//session
if (isset($_SESSION['username']) and isset($_SESSION['level']) ) {

// akses filter
$user_now = $_SESSION['username'];
$level = $_SESSION['level'];


} else {
	$level = "";
	$user_now ="";
}


if (empty($_GET['page'])) { 
	$page = "login";
	
} 
	include "app/helper.php";
	include "app/proses_$page.php";
	

ob_end_flush();

?>

 
 





 
 
 
 
 
 