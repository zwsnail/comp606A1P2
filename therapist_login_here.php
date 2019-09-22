<?php
session_start();
require('db_connect.php');
if (isset($_POST['therapist_email'])){
	$therapist_email = stripslashes($_POST['therapist_email']);
	$therapist_email = mysqli_real_escape_string($con,$therapist_email);
	$password = stripslashes($_POST['password']);
	$password = mysqli_real_escape_string($con,$password);
        $query = "SELECT * FROM therapist WHERE therapist_email='$therapist_email'
and password='".md5($password)."'";
//echo $query;
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['therapist_email'] = $therapist_email;
	    header("Location: index.php");
         }else{
		header("Location:wrong_login.php");
	}
}
?>

