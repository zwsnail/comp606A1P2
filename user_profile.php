<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width:50%; 
  margin-left:25%;
   margin-right:25%; 
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<?php
require('db_connect.php');
session_start();
if(!isset($_SESSION["email"])){
	header("Location: login_register.php");
	exit(); 
}else{
	$email = $_SESSION["email"];
	$query = "SELECT * FROM user WHERE email='$email'";
	$result = mysqli_query($con,$query) or die(mysql_error());
    
    $row =  mysqli_fetch_row($result);
    //print_r($row);
	if($result != null){
		$userid = $row[0];
        $username = $row[1];
        //echo $username;
        $birthdate = $row[3];
        //echo $birthdate;
		$mob_number = $row[4];
        $email = $row[5];
	   // echo $email;
	   $is_late = $row[7];
    }
	
}
?>
<?php
date_default_timezone_set("Pacific/Auckland");
$current_date = new DateTime(); // Date object using current date and time
$current_date= $current_date->format('Y-m-d'); 
?>
<div class='form' style="text-align:center;">
<h1>Welcome <?php echo $username; ?></h1>
<h2 >Your Details</h2>
<h3>Email: <?php echo $email; ?></h3>
<h3>Birth date: <?php echo $birthdate; ?></h3>
<h3>Mobile number: <?php echo $mob_number; ?></h3>
</div>
<div style="text-align:center;">
<table style="text-align:center;">
  <tr>
    <th>Massage Date Time</th>
    <th>Reason</th>
	<th>Massage Type</th>
	<th>Package</th>
	<th>Update Booking</th>
	<th>Cancle Booking</th>
	
	
  </tr>
<?php
$query1 = "SELECT * FROM booking WHERE user_id='$userid'";
	$result = mysqli_query($con,$query1) or die(mysql_error());
    if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			
		//get date and time after 24 hours of submission massage date time
		$after_24= $row['massage_time'];
		// get date after 24 hours
		$after_24= new \DateTime($after_24.' +1 day');
		$after_24= $after_24->format('Y-m-d');
		//echo $after_24;
		//get submitted massage date time
        $submitted_date = $row['massage_time'];
		$submitted_date = new DateTime($submitted_date);
		$submitted_date= $submitted_date->format('Y-m-d');
		
			echo "<tr>";
    		echo"<td>".$submitted_date."</td>";
			echo"<td>".$row['reason']."</td>";
			echo"<td>".$row['massage_type']."</td>";
			echo"<td>".$row['price']."</td>";
			echo"<td><a href='edit_booking.php?id=".$row['id']."'>Edit</a></td>";
			if($submitted_date <= $current_date && $after_24 <= $current_date){
				echo"<td><a href='cancle_booking.php?id=".$row['id']."&is_late=Yes'>Cancle</a> with late fee.</td>";
			}else{
				echo"<td><a href='cancle_booking.php?id=".$row['id']."&is_late=No''>Cancle</a></td>";
			}

  			echo"</tr>";
		}
	} else {
		echo "<tr>";
    		echo"<td> </td>";
			echo"<td> </td>";
			echo"<td>  No Record Found</td>";
			echo"<td> </td>";
			echo"<td> </td>";
  		echo"</tr>";
	}
	
?> 
</table>
<div>
<?php 
	if($is_late == "Yes"){
      echo "<br><h2>Please pay $10 late cancellation fee.</h2>";
	}
	?>
</div>
</div>

