<?php
require('db_connect.php');
session_start();
if(!isset($_SESSION["email"])){
	header("Location: login_first.php");
	exit(); 
}else{
	$email = $_SESSION["email"];
	$booking_id = $_GET["id"];
	$query1 = "SELECT * FROM booking WHERE id='$booking_id'";
	$result = mysqli_query($con,$query1) or die(mysql_error());
    if (mysqli_num_rows($result) > 0) {
		// output data of each row
	$row = mysqli_fetch_assoc($result);
		//echo $row['massage_time'];
		
		//echo $row['reason'];
		//echo $row['price'];
		//die("hello");
	}
	
}
?>
<?php
date_default_timezone_set("Pacific/Auckland");
$date = new DateTime();
$min_date= $date->format('Y-m-d\TH:i:s');

$submitted_date = $row['massage_time'];
$submitted_date = new DateTime($submitted_date);
$submitted_date= $submitted_date->format('Y-m-d\TH:i:s');

$current_date = new DateTime(); // Date object using current date and time
$current_date= $current_date->format('Y-m-d\TH:i:s'); 


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-wideth,initial-scale=1">
	<title>User Registration & Login System</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonyous">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
	$.noConflict();
  jQuery( function($) {
	$( "#opener" ).click(function() {
    $( "#dialog-message" ).dialog({
      modal: true,
      buttons: {
        Ok: function() {
          $( this ).dialog( "close" );
        }
      }
    });
});
});
  </script>
	
	
</head>
<body class="bg-dark">
	<div class="container mt-4">
	<!-- booking form -->

		<div class="row">
			<div class="col-lg-4 offset-lg-4 bg-light rounded" id="register-box">
				<h2 class="text-center mt-2">Booking</h2>
				<form action="update_booking.php" method="post" role="form" class="p-2" id="booking-frm">
				    <input type="hidden" value="<?php echo $booking_id; ?>" name="booking_id">
                    <div class="form-group">
						<label>Choose an appointment date<input type="datetime-local" name="massage_time" class="form-control" value="<?php echo $submitted_date;?>" min ="<?php echo $min_date; ?>" required></label>
					</div>
					<div class="form-group">
					 <label for="sel">May I know the reason you want to have the massage?(hold shift to select more than one)</label>
				      <select  class="form-control" name="reason" id="sel" >
				        <option name="reason" value="Recovering from injury"  <?php if ($row['reason'] == "Recovering from injury" ) echo 'selected ' ; ?>>Recovering from injury</option>
				        <option name="reason" value="Dealing with anxiety" <?php if ($row['reason'] == "Dealing with anxiety" ) echo 'selected ' ; ?>>Dealing with anxiety</option>
				        <option name="reason" value="Just relaxing"  <?php if ($row['reason'] == "Just relaxing" ) echo 'selected ' ; ?>>Just relaxing</option>
				        <option name="reason"value="Other reason" <?php if ($row['reason'] == "Other reason" ) echo 'selected ' ; ?>>Other reason I don't want to say</option>
				      </select>

					</div>
					<div class="form-group">
					 <label for="sel">Please choose the package</label>
				      <select  class="form-control" name="price" id="price">
				        <option name="price"  <?php if ($row['price'] == "$45 for 30min" ) echo 'selected ' ; ?> value="$45 for 30min">$45 for 30min</option>
				        <option name="price" <?php if ($row['price'] == "$75 for 60min" ) echo 'selected ' ; ?>value="$75 for 60min">$75 for 60min</option>
				      </select>

					</div>
					
					<div class="form-group">
						<input type="submit" name="register" id="register" value="Register" class="btn btn-primary btn-block">
					</div>
				</form>

			</div>
		</div>
</div>

	</div>
	


<div id="dialog-message" title="Important Message" style="display:none;">
  <p>
    <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
    You can cancle your booking within 24 hours only.
  </p>
</div>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonyous"></script>
	<script src="http://code.jquery.com/jquery-3.4.1.min.js"   integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="   crossorigin="anonymous"></script>

  	<!-- form validation by using jQuery -->
    
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
	<script>
		// hide different form by usage
		$(document).ready(function(){
		   	$("#booking-frm").validate({
		   		rules:{
		   			cpass:{
		   				equalTo:"#pass",
		   			},
		   		email: {
            required: true,
            email: true,
                remote: {
                    url: "check_email.php",
                    type: "post"
                 }
        }
    },
    messages: {
        email: {
            required: "Please enter your email address.",
            email: "Please enter a valid email address.",
            remote: "Email does not exist. please sign up."
        }
    }
	});
		 
		});
	</script>


</body>
</html>
