<?php 
require_once("db_connect.php"); 
//require_once("./email/PHPMailerAutoload.php");
?>

<?php
//print_r($_POST);
	if (isset($_POST['massage_time'])){   //check if fullname is there
/*stripslashes() function removes backslashes added by the addslashes() 
  mysqli_real_escape_string is used to stop SQL injection attack 
  $_POST use to get data from form 
  mysqli_query() function is used to execute SQL queries. */
  $user_id = stripslashes($_POST['user_id']);
  $user_id = mysqli_real_escape_string($con,$user_id); 
  $user_email = stripslashes($_POST['user_email']);
  $user_email = mysqli_real_escape_string($con,$user_email); 
 $massage_time = stripslashes($_POST['massage_time']);
 $massage_time = mysqli_real_escape_string($con,$massage_time);
 $time = stripslashes($_POST['time']);
 $time = mysqli_real_escape_string($con,$time); 
 $massage_type = stripslashes($_POST['massage_type']);
 $massage_type = mysqli_real_escape_string($con,$massage_type); 
 $reason = stripslashes($_POST['reason']);
  $reason = mysqli_real_escape_string($con,$reason); 
  $price = stripslashes($_POST['price']);
	$price = mysqli_real_escape_string($con,$price); 
    $created = date("Y-m-d H:i:s");
$query = "INSERT into booking(user_id,massage_time,time,reason,massage_type,price,created)
		VALUES('$user_id','$massage_time','$time','$reason','$massage_type','$price','$created')";
        //echo $query;  
        //die("m here");
		//$results = mysqli_query($con, $query); 
		
	$result = mysqli_query($con,$query);   //send data to database
        if($result){   //true if no error in data insertion
            /*$email = "mr.sahil.in@gmail.com";
            $to_id = $user_email;
            $message = "Hello Dear,";
            $message .= "Your appointment for suport massage is done. Please come at".$_POST['massage_time'];
            $message .= "Thanks.";
            $subject = $_POST['price'];
        
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->Host = 'localhost';
            $mail->Port = 25;
            $mail->SMTPSecure = false;
            $mail->SMTPAuth = false;
            $mail->Username = $email;
            $mail->addAddress($to_id);
            $mail->Subject = $subject;
            $mail->msgHTML($message);
            if (!$mail->send()) {
                $error = "Mailer Error: " . $mail->ErrorInfo;
                echo '<p id="para">'.$error.'</p>';
                die("hello die mail");
            }  
            else {
                echo '<p id="para">Message sent!</p>';
                die("m here");
            }*/
        	header("Location: user_profile.php");
        }
    }
?>
