<?php ob_start(); ?>
<?php 
include 'inc/Session.php';
Session::checkSession(); ?>
<?php include 'inc/config.php';?>
<?php include 'inc/Database.php';?>
<?php include 'inc/Format.php';?>
<?php 
		$db = new Database();
		$fm = new Format();		
 ?>
 <?php
 if(isset($_GET['action']) && isset($_GET['action'])=="logout"){
                  Session::destroy();
              }
?>
 <!DOCTYPE html>
<html>
<head>
	<title>Rooti Project</title>
	<link rel="stylesheet" href="bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
</div>
<div class="container">

<a href="index.php"><img class="img-responsive" src="roti.jpg" alt="Chania"></a>
<marquee style="font-size:30px" scrollamount="15">Users soon will be able to change their username and will get a forgot username option</marquee>
	<center><h4>Hello <?php echo Session::get('username'); ?></h4></center>
	<center><a href="?action=logout">Logout</a></h4></center>                  
</div>