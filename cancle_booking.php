<?php
require('db_connect.php');
session_start();
if(!isset($_SESSION["email"])){
	header("Location: login_first.php");
	exit(); 
}else{
	$email = $_SESSION["email"];
	$booking_id = $_GET["id"];
	$is_late = $_GET["is_late"];
	if($is_late == 'Yes'){
		$query1= "SELECT user_id from booking where id= $booking_id ";
		echo $query1;
			$result = mysqli_query($con,$query1) or die(mysql_error());
		if (mysqli_num_rows($result) > 0) {
			$row =  mysqli_fetch_row($result);
			$user_id = $row[0];
			$updated = date("Y-m-d H:i:s");
				$query = "UPDATE user SET is_late='$is_late',updated='$updated' WHERE id='$user_id'";
				//echo $query;
				//die("hello");
				$result = mysqli_query($con,$query);   //send data to database
        		if($result){   //true if no error in data insertion
        			echo "Please pay your late cancellation fee.";
				} 
		}
	}
	// query to delete a record from booking table
	$query1 = "DELETE FROM booking WHERE id='$booking_id'";
	$result = mysqli_query($con,$query1) or die(mysql_error());
    if ($result) {			
		header("Location:user_profile.php");
	}else{
		echo "There is an problem. Please fix that";
	}
	
}
?>
