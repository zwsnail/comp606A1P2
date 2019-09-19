<?php require_once("db_connect.php"); ?>
<?php
//print_r($_POST);
if (isset($_POST['email'])){   //check if fullname is there
/*stripslashes() function removes backslashes added by the addslashes() 
  mysqli_real_escape_string is used to stop SQL injection attack 
  $_POST use to get data from form 
  mysqli_query() function is used to execute SQL queries. */
  //echo "m here";
 //die("m in");
	$email = stripslashes($_POST['email']);
    $email = mysqli_real_escape_string($con,$email);
   
	
    $query = "SELECT email FROM user WHERE email='$email'";
	$result1 = mysqli_query($con, $query);
	$email = mysqli_fetch_assoc($result1)['email'];
       if($email != null) { //check rows greater then zero (although it will also not make any difference)
            echo 'true';
        } else {
            echo 'false';
        }	
	
}
?>