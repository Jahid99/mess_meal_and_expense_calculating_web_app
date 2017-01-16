<?php ob_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Rooti Project</title>
	<link rel="stylesheet" href="bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<img class="img-responsive" src="roti.jpg" alt="Chania">
<marquee style="font-size:30px" scrollamount="15">Users soon will be able to change their username and will get a forgot username option</marquee>
</div>
<?php include 'inc/Session.php';
session_start();
Session::checkLogin();
?>
<?php include 'inc/Database.php';?>
<?php include 'inc/config.php';?>
<?php include 'inc/Format.php';?>
<?php
		$db = new Database();
		$fm = new Format();		
 ?>
<?php
if ($_SERVER['REQUEST_METHOD']=='POST'){
            $username =  mysqli_real_escape_string($db->link,$_POST['username']);
		 	$username =  mysqli_real_escape_string($db->link,$username);
		 	$query = "SELECT * FROM members WHERE username = '$username'";
		 	$result = $db->select($query);
		 	if($result!= false){
		 		//$value = mysqli_fetch_array($result);
		 		$value = $result->fetch_assoc();
		 			Session::set("login",true);
		 			Session::set("username",$value['username']);
		 			Session::set("userId",$value['id']);
		 			header('Location:/roti/');
		 			
		 	}else{
		 		echo "<center><span style='color:red;font-size:40px;'>Username not matched !!!.</span></center>";
		 	}
} ;?>
<div class="container">
  <h2>Please enter your username</h2>
  <form action="login.php" method="post">
    <div class="form-group">
      <input type="name" class="form-control" name="username" id="name" placeholder="Enter your username" style="width:400px">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>
<?php ob_end_flush(); ?>
<?php include 'inc/footer.php';  ?>