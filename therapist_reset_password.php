<?php
require('db_connect.php');  // call database connection file
if (isset($_POST['password'])){   //check if fullname is there
/*stripslashes() function removes backslashes added by the addslashes() 
  mysqli_real_escape_string is used to stop SQL injection attack 
  $_POST use to get data from form 
  mysqli_query() function is used to execute SQL queries. */
	$therapist_email = $_POST["therapist_email"];
	$therapist_email = mysqli_real_escape_string($con,$therapist_email);
	$new_pass = md5($_POST['password']);
	$new_pass = mysqli_real_escape_string($con,$new_pass);
        $query = "UPDATE therapist SET password='$new_pass' WHERE therapist_email='$therapist_email'";
        //echo $query;  
        
$result = mysqli_query($con,$query);   //send data to database
        if($result){   //true if no error in data insertion
        	header("Location:login_register.php");
	} 
} 
?>    