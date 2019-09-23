<?php
session_start();
require('db_connect.php');
if(isset($_SESSION["email"])){
$email = $_SESSION["email"];
$sql1 = "SELECT * FROM user WHERE email='$email'";
$result1 = mysqli_query($con, $sql1);
$username = mysqli_fetch_assoc($result1)['fullname'];
}

if(isset($_SESSION["therapist_email"])){
	$therapist_email = $_SESSION["therapist_email"];
	$sql1 = "SELECT * FROM therapist WHERE therapist_email='$therapist_email'";
	$result1 = mysqli_query($con, $sql1);
	$username = mysqli_fetch_assoc($result1)['fullname'];
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Massage Booking</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- css files -->
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all">
<link rel="stylesheet" href="css/prettySticky.css" type="text/css">
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //js files -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script> 
<!-- //js --> 
</head>
<body>
	<!-- banner -->
	
			<!-- navigation -->
			<div class="top-nav">
				<nav>
					<div class="container">
						<div class="navbar-header logo">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<h1><a href="index.php">Health Care</a></h1>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-right">
								<li><a href="index.php" class="link-kumya active scroll"><span data-letters="Home">Home</span></a></li>
								<?php if(isset($_SESSION["email"])){	
									echo'<li><a href="user_profile.php" class="link-kumya"><span data-letters="profile">Profile</span></a></li>';								
									echo'<li><a href="logout.php" class="link-kumya"><span data-letters="Logout">Logout</span></a></li>';
 								}else{
									echo'<li><a href="login_register.php" class="link-kumya"><span data-letters="Login">Login/Registration</span></a></li>';

								 } ?>
								 <?php if(isset($_SESSION["therapist_email"])){	
									echo'<li><a href="therapist_profile.php" class="link-kumya"><span data-letters="profile">Profile</span></a></li>';								
									echo'<li><a href="therapist_logout.php" class="link-kumya"><span data-letters="Logout">Logout</span></a></li>';
 								}else{
									echo'<li><a href="therapist_login.php" class="link-kumya"><span data-letters="Login">Therapist Login</span></a></li>';

								 } ?>

							</ul>	
							<div class="clearfix"> </div>
						</div>
					</div>
				</nav>
			</div>	
			<!-- //navigation -->
			
	
	<!-- //banner -->
	
