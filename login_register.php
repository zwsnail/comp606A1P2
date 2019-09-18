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
	<style type="text/css">
		#alert, #register-box, #forgot-box{
			display: none;
		}
	</style>
	
</head>
<body class="bg-dark">
	<div class="container mt-4">
		<div class="row">
			<div class="col-lg-4 offset-lg-4" id="alert">
				<div class="alert alert-success">
					<strong id="result">Hello World!</strong>
				</div>
			</div>
		</div>
 
		<!-- login form -->
    <div class = "form_area">
		<div class="row" >
			<div class="col-lg-4 offset-lg-4 bg-light rounded" id="login-box">
				<h2 class="text-center mt-2">Login</h2>
				<form action="login_here.php" method="post" role="form" class="p-2" id="login-frm">
					<div class="form-group">
						<input type="email" name="email" class="form-control" placeholder="Email" required>
					</div>
					<div class="form-group">
						<input type="password" name="password" class="form-control" placeholder="Password" required minlength="6">
					</div>
					<div class="form-group">
						<div class="custom-control custom-checkbox">
							<input type="checkbox" name="rem" class="custom-control-input" id="customCheck">
							<label for="customCheck" class="custom-control-label">Remember me</label>
							<a href="#" id="forgot-btn" class="float-right">Forgot Password?</a>
						</div>
					</div>
					<div class="form-group">
						<input type="submit" name="login" id="login" value="Login" class="btn btn-primary btn-block">
					</div>
					<div class="form-group">
						<p class="text-center">New user? <a href="#" id="register-btn">Register Here</a></p>
						
					</div>


				</form>

			</div>
		</div>


			<!-- registration form -->

		<div class="row">
			<div class="col-lg-4 offset-lg-4 bg-light rounded" id="register-box">
				<h2 class="text-center mt-2">Register</h2>
				<form action="insert_data.php" method="post" role="form" class="p-2" id="register-frm">
					<div class="form-group">
						<input type="text" name="fullname" class="form-control" placeholder="Fullname" required minlength="3">
					</div>
					<div class="form-group">
					<label><input type="radio" name="gender" class=".radio-inline" value="female" required>Female</label>
					<label><input type="radio" name="gender" class=".radio-inline" value="male" required>Male</label>
					</div>

					<div class="form-group">
						<label>Date of Birthday<input type="date" class="form-control" name="birth_date" value="date" required></label>
					</div>
                    <div class="form-group">
						<input type="text" name="mob_number" class="form-control" placeholder="Mobile number">
					</div>
					<div class="form-group">
						<input type="email" name="email" class="form-control" placeholder="Email" id="email" required>
					</div>
					<div class="form-group">
						<label>Which time would you like to come?<input type="datetime-local" name="massage_time" class="form-control" required></label>
					</div>

					<div class="form-group">


				      <label for="sel">May I know the reason you want to have the massage?(hold shift to select more than one)</label>
				      <select multiple class="form-control" name="reason" id="sel">
				        <option name="reason" value="Recovering from injury">Recovering from injury</option>
				        <option name="reason" value="Dealing with anxiety">Dealing with anxiety</option>
				        <option name="reason" value="Just relaxing">Just relaxing</option>
				        <option name="reason"value="Other reason I don't want to say" >Other reason I don't want to say</option>
				      </select>

					</div>


					<div class="form-group">
						<label>Please choose the package</label>
						<div class="custom-control custom-checkbox mb-3">
					       <input type="checkbox" class="custom-control-input" id="price1" name="price" value="45">
					       <label class="custom-control-label" for="price1">$45 for 30min</label>
					    </div>
						<div class="custom-control custom-checkbox mb-3">
					       <input type="checkbox" class="custom-control-input" id="price2" name="price" value="75">
					       <label class="custom-control-label" for="price2">$75 for 60min</label>
				    	</div>
				    </div>


<!-- 					<div class="form-group">
						<label>Please choose the package</label>
						<label><input type="radio" name="price" class="form-control" value="45">$45 for 30min</label>
						<label><input type="radio" name="price" class="form-control" value="75">$75 for 60min</label>
					</div> -->

					<div class="form-group">
						<input type="password" name="password" id="pass"class="form-control" placeholder="Password" required minlength="6">
					</div>
					<div class="form-group">
						<input type="password" name="cpass" id="cpass" class="form-control" placeholder="Comfirm Password" required minlength="6">
					</div>
					<div class="form-group">
						<div class="custom-control custom-checkbox">
							<input type="checkbox" name="rem" class="custom-control-input" id="customCheck2">
							<label for="customCheck2" class="custom-control-label">I green to the <a href="#">terms & conditions.</a></label>
						</div>
					</div>
					<div class="form-group">
						<input type="submit" name="register" id="register" value="Register" class="btn btn-primary btn-block">
					</div>
					<div class="form-group"> 
						<p class="text-center">Already Registered?<a href="#" id="login-btn"> Login Here</a></p>
						
					</div>


				</form>

			</div>
		</div>


			<!-- forgot password -->

		<div class="row">
			<div class="col-lg-4 offset-lg-4 bg-light rounded" id="forgot-box">
				<h2 class="text-center mt-2">Reset Password</h2>
				<form action="reset_password.php" method="post" role="form" class="p-2" id="forgot-frm">
					<div class="form-group">
						<small class="text-muted">
							To reset your password, enter the email address and we will send reset password instructions on your email.
						</small>

					</div>
					<div class="form-group">
						<input type="email" name="femail" class="form-control" placeholder="Email" required>
					</div>
					<div class="form-group">
						<input type="password" name="password" id="rpass"class="form-control" placeholder="Password" required minlength="6">
					</div>
					<div class="form-group">
						<input type="password" name="cpass" id="rcpass" class="form-control" placeholder="Comfirm Password" required minlength="6">
					</div>
					<div class="form-group">
						<input type="submit" name="forgot" id="forgot" value="Reset" class="btn btn-primary btn-block">
					</div>
					<div class="form-group text-center">
						<a href="#" id="back-btn">Back</a>
						
					</div>


				</form>

			</div>
		</div>

</div>

	</div>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonyous"></script>
	<script src="http://code.jquery.com/jquery-3.4.1.min.js"   integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="   crossorigin="anonymous"></script>

  	<!-- form validation by using jQuery -->
    
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
	<script>
		// hide different form by usage
		$(document).ready(function(){
		  $("#forgot-btn").click(function(){
		  	$("#login-box").hide();
		  	$("#forgot-box").show();
		  });
		   $("#register-btn").click(function(){
		  	$("#login-box").hide();
		  	$("#register-box").show();
		  });
		   	$("#login-btn").click(function(){
		  	$("#login-box").show();
		  	$("#register-box").hide();
		  });
		   	$("#back-btn").click(function(){
		  	$("#login-box").show();
		  	$("#forgot-box").hide();
		  });

		  // validate the form
		   	$("#login-frm").validate();
		   	$("#register-frm").validate({
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
            remote: "Email already in use!"
        }
    }
	});
		   	$("#forgot-frm").validate({
		   		rules:{
		   			rcpass:{
		   				equalTo:"#rpass",
		   			}
			   }
		});
		});
	</script>



</body>
</html>
