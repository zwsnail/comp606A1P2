<?php
require('db_connect.php');
session_start();
if(!isset($_SESSION["email"])){
	header("Location: login_first.php");
	exit(); 
}else{
	$email = $_SESSION["email"];
	$query = "SELECT * FROM user WHERE email='$email'";
	$result = mysqli_query($con,$query) or die(mysql_error());
    //print_r($result);
	if($result != null){
		$userid = mysqli_fetch_assoc($result)['id'];
	}
}

?>
<?php
date_default_timezone_set("Pacific/Auckland");
$date = new DateTime();
$min_date= $date->format('Y-m-d\TH:i:s');

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
				<form action="insert_booking.php" method="post" role="form" class="p-2" id="booking-frm">
				    <input type="hidden" value="<?php echo $userid; ?>" name="user_id">
					<input type="hidden" value="<?php echo $email; ?>" name="user_email">
				    <div class="form-group">
						<label>Choose an appointment date<input type="datetime-local" name="massage_time" class="form-control" value="<?php echo $current_date; ?>" min ="<?php echo $min_date; ?>" required></label>
					</div>
					<div class="form-group">
					 <label for="sel">May I know the reason you want to have the massage?(hold shift to select more than one)</label>
				      <select  class="form-control" name="reason" id="sel">
				        <option name="reason" value="Recovering from injury">Recovering from injury</option>
				        <option name="reason" value="Dealing with anxiety">Dealing with anxiety</option>
				        <option name="reason" value="Just relaxing">Just relaxing</option>
				        <option name="reason"value="Other reason" >Other reason I don't want to say</option>
				      </select>

					</div>
					<div class="form-group">
					 <label for="sel">Please choose the package</label>
				      <select  class="form-control" name="price" id="price">
				        <option name="price" value="$45 for 30min">$45 for 30min</option>
				        <option name="price" value="$75 for 60min">$75 for 60min</option>
				      </select>

					</div>
					
					<div class="form-group">
						<div class="custom-control custom-checkbox">
						<input type="checkbox" name="rem" class="custom-control-input" id="customCheck2">
						<label for="customCheck2" class="custom-control-label">I green to the <a href="#" id="opener">terms & conditions.</a></label>

						</div>
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
        },
		rem:{
			required: true
		}
    },
    messages: {
        email: {
            required: "Please enter your email address.",
            email: "Please enter a valid email address.",
            remote: "Email does not exist. please sign up."
        },
		rem:{
			required: "Please check term and conditions."
		}
    }
	});
		 
});
	</script>
</body>
</html>
