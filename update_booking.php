<?php
require('db_connect.php');  // call database connection file
if (isset($_POST['massage_time'])){   //check if fullname is there
/*stripslashes() function removes backslashes added by the addslashes() 
  mysqli_real_escape_string is used to stop SQL injection attack 
  $_POST use to get data from form 
  mysqli_query() function is used to execute SQL queries. */
  $massage_time = stripslashes($_POST['massage_time']);
  $massage_time = mysqli_real_escape_string($con,$massage_time); 
  $reason = stripslashes($_POST['reason']);
   $reason = mysqli_real_escape_string($con,$reason); 
   $price = stripslashes($_POST['price']);
   $price = mysqli_real_escape_string($con,$price); 
   $booking_id = stripslashes($_POST['booking_id']);
   $booking_id = mysqli_real_escape_string($con,$booking_id); 
   $updated = date("Y-m-d H:i:s");
   // query to update data
        $query = "UPDATE booking SET massage_time='$massage_time',reason='$reason',price='$price',updated='$updated' WHERE id='$booking_id'";
        //echo $query;
        
        
$result = mysqli_query($con,$query);   //send data to database
        if($result){   //true if no error in data insertion
        	header("Location:user_profile.php");
	} 
} 
?>    