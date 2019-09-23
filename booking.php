<?php
require('db_connect.php');
require('header.php');
session_start();
if(!isset($_SESSION["email"])){
	header("Location: login_register.php");
	exit(); 
}else{
	$email = $_SESSION["email"];
	$query = "SELECT * FROM user WHERE email='$email'";
	$result = mysqli_query($con,$query) or die(mysql_error());
    //print_r($result);
	if($result != null){
		$userid = mysqli_fetch_assoc($result)['id'];
	}

	$query2 = "SELECT * FROM booking";
	$result = mysqli_query($con,$query2) or die(mysql_error());

	if (mysqli_num_rows($result) > 0) {
		// output data of each row
	while($row = mysqli_fetch_assoc($result)) {
		// output data of each row
		//print_r($row);
	    $massage_date =  $row['massage_time'];
		$massage_time = $row['time'];
		?>
		<script>
		$( document ).ready(function() {
		var massage_date = "<?php echo $row['massage_time']; ?>";
		var massage_time = "<?php echo $row['time']; ?>";
        var date = $("#massage_time").val();
		var time = $("#time").val();
		$("#massage_time").on("change", function () {
    		var date = $(this).val();
			if(massage_date == date && massage_time == time){
		}
   			});
		$("#time").on("change", function () {
    		var time = $(this).val();
			if(massage_date == date && massage_time == time){
				//alert("#time option[value='"+time+"']");
		     $("#time option[value='"+time+"']").prop("disabled",true);
		}else{
			$("#time option[value='"+time+"']").removeAttr("disabled");
		}
   		});
		   if(massage_date == date && massage_time == time){
			//alert("#time option[value='"+time+"']");
		     $("#time option[value='"+time+"']").prop("disabled",true);
          //alert("matched");
		 
		}else{
			$("#time option[value='"+time+"']").removeAttr("disabled");
		}
		 });
		
		</script>
		<?php
	}
}
}

?>
<?php
date_default_timezone_set("Pacific/Auckland");
$date = new DateTime();
$min_date= $date->format('Y-m-d');

$current_date = new DateTime(); // Date object using current date and time
$current_date= $current_date->format('Y-m-d'); 


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

		<div class="row form_container" >
			<div class="col-lg-4 offset-lg-4 bg-light rounded" id="register-box">
				<h2 class="text-center mt-2">Booking</h2>
				<form action="insert_booking.php" method="post" role="form" class="p-2" id="booking-frm">
				    <input type="hidden" value="<?php echo $userid; ?>" name="user_id">
					<input type="hidden" value="<?php echo $email; ?>" name="user_email">
				    <div class="form-group">
						<label>Choose an appointment date<input id="massage_time" type="date" name="massage_time" class="form-control" value="<?php echo $current_date; ?>" min ="<?php echo $min_date; ?>" required></label>
					</div>
					<div class="form-group">
					 <label for="time">Select Time</label>
				      <select  class="form-control" name="time" id="time">
				        <option name="time" value="11:00">11:00</option>
				        <option name="time" value="12:00">12:00</option>
				        <option name="time" value="1:00">1:00</option>
				        <option name="time"  value="2:00">2:00</option>
						<option name="time"  value="3:00">3:00</option>
						<option name="time"  value="4:00">4:00</option>
				      </select>

					</div>
					<div class="form-group">
					 <label for="massage_type">Massage Type</label>
				      <select  class="form-control" name="massage_type" id="sel">
				        <option name="massage_type" value="Deep Tissue Massage">Deep Tissue Massage</option>
				        <option name="massage_type" value="Aromatherapy Massage">Aromatherapy Massage</option>
				        <option name="massage_type" value="Sports Massage">Sports Massage</option>
				        <option name="massage_type"value="Therapeutic Massage" >Therapeutic Massage</option>
						<option name="massage_type"value="Relaxation Massage" >Relaxation Massage</option>

				      </select>

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
						<input type="submit" name="register" id="register" value="Make a Booking" class="btn btn-primary btn-block">
					</div>
				</form>
			</div>
		</div>
</div>
</div>
<div id="dialog-message" title="Important Message" style="display:none;">
  <p>
    <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
    You can get charged by $10 if you cancel your booking after 24 hours .
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
		},
		time:{
			required: true
		}

    },
    messages: {
        email: {
            required: "Please enter your email address.",
            email: "Please enter a valid email address.",
            remote: "Email does not exist. please sign up."
        },
		time:{
			required: "This time is already booked. Please choose other timing."
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
