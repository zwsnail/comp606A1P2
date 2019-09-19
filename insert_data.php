<?php require_once("db_connect.php"); ?>
<?php
//print_r($_POST);
	if (isset($_POST['email'])){   //check if fullname is there
/*stripslashes() function removes backslashes added by the addslashes() 
  mysqli_real_escape_string is used to stop SQL injection attack 
  $_POST use to get data from form 
  mysqli_query() function is used to execute SQL queries. */
 
	$fullname = stripslashes($_POST['fullname']);   
	$fullname = mysqli_real_escape_string($con,$fullname); 
	$gender = stripslashes($_POST['gender']);
	$gender = mysqli_real_escape_string($con,$gender);
	$birth_date = stripslashes($_POST['birth_date']);
	$birth_date = mysqli_real_escape_string($con,$birth_date); 
	$mob_number = stripslashes($_POST['mob_number']);
	$mob_number = mysqli_real_escape_string($con,$mob_number); 
	$email = stripslashes($_POST['email']);
	$email = mysqli_real_escape_string($con,$email);
	$password = stripslashes($_POST['password']);
  $password = mysqli_real_escape_string($con,$password);
 // $massage_time = stripslashes($_POST['massage_time']);
 // $massage_time = mysqli_real_escape_string($con,$massage_time); 
//$reason = stripslashes($_POST['reason']);
  //$reason = mysqli_real_escape_string($con,$reason); 
  //$price = stripslashes($_POST['price']);
	//$price = mysqli_real_escape_string($con,$price); 
	$created = date("Y-m-d H:i:s");
        $query = "INSERT into user(fullname,gender,birth_date,mob_number,email,password,created)
		VALUES('$fullname','$gender','$birth_date','$mob_number','$email','".md5($password)."','$created')";
        echo $query;  
		//$results = mysqli_query($con, $query); 
		
	$result = mysqli_query($con,$query);   //send data to database
        if($result){   //true if no error in data insertion
        	header("Location: login_register.php");
        }
    }
?>
