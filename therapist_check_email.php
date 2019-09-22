<?php require_once("db_connect.php"); ?>
<?php
//print_r($_POST);
if (isset($_POST['therapist_email'])){   //check if fullname is there
/*stripslashes() function removes backslashes added by the addslashes() 
  mysqli_real_escape_string is used to stop SQL injection attack 
  $_POST use to get data from form 
  mysqli_query() function is used to execute SQL queries. */
  //echo "m here";
 //die("m in");
	$therapist_email = stripslashes($_POST['therapist_email']);
	$therapist_email = mysqli_real_escape_string($con,$therapist_email);
	
	$query = "SELECT therapist_email FROM therapist WHERE therapist_email='$therapist_email'";
	$result1 = mysqli_query($con, $query);
	$therapist_email = mysqli_fetch_assoc($result1)['therapist_email'];
       if($therapist_email != null) { //check rows greater then zero (although it will also not make any difference)
            echo 'false';
        } else {
            echo 'true';
        }	
	
}
?>