<?php require_once("db_connect.php"); ?>
<?php
//print_r($_POST);
if (isset($_POST['password'])){   
  //echo "m here";
 //die("m in");
	$email = stripslashes($_POST['email']);
    $email = mysqli_real_escape_string($con,$email);
    $password = md5($_POST['password']);
	$password = mysqli_real_escape_string($con,$password);
    echo $email;
    
    $query = "SELECT password FROM user WHERE email='$email'and password ='$password' ";
    echo $query;
	$result1 = mysqli_query($con, $query);
    $password = mysqli_fetch_assoc($result1)['password'];
    echo $password;
       if($password != null) { //check rows greater then zero (although it will also not make any difference)
            echo 'true';

        } else {
            echo 'false';
        }	
	
}
?>