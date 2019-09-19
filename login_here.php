<?php
session_start();
require('db_connect.php');
if (isset($_POST['email'])){
	$email = stripslashes($_POST['email']);
	$email = mysqli_real_escape_string($con,$email);
	$password = stripslashes($_POST['password']);
	$password = mysqli_real_escape_string($con,$password);
        $query = "SELECT * FROM user WHERE email='$email'
and password='".md5($password)."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['email'] = $email;
	    header("Location: index.php");
         }else{
		header("Location:wrong_login.php");
	}
}
?>

