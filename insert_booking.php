<?php 
require_once("db_connect.php"); 
// require_once("./email/PHPMailerAutoload.php");
?>

<?php
print_r($_POST);
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
                echo "$query";  
                //die("m here");
                //$results = mysqli_query($con, $query); 
            $result = mysqli_query($con,$query);   //send data to database
     
    if($result){   //true if no error in data insertion
           //Sending the email function below. 
			//Send email via Gmail SMTP server in PHP
	 // require 'email/PHPMailerAutoload.php';
            require_once("email/PHPMailerAutoload.php");

            $email = "wangbin2018727@gmail.com";
            $password = '112233tzllzt';
            $to_id = $user_email;
           

            $message = '<h1 style="font-style:italic;">Dear customer, </h1>'
                    . "\n"
                    . '<h3 style="color: #f00"><b>Please note:</b> If you cancel your booking within 24 hours, there is $10 cancellation fee!<h3>'
                    . "\n"
                    . '<h4 style="color: blue">Thanks for choose us! Your booking infromation as below: </h4>'
                    .'<html>
                    <head>
                    <title>Table with database</title>
                    <style>
                    table {
                    border-collapse: collapse;
                    width: 100%;
                    color: #588c7e;
                    font-family: monospace;
                    font-size: 12px;
                    text-align: left;
                    }
                    h2 {
                    color: #FF5722;   
                    text-align: center;
                    }
                    th {
                    background-color: #588c7e;
                    color: white;
                    }
                    tr:nth-child(even) {background-color: #f2f2f2}
                    </style>
                    </head>
                    <body>
                    <h2>Hamilton Massage Shop</h2>
                    <table>
                    <tr>
                    <th>Unique ID</th>
                    <th>Massage Time</th>
                    <th>Email</th>
                    <th>Special Need</th>
                    <th>The Package</th>
                    <th>Time of Creating This Booking</th>
                    </tr>
                    <tr><td>'.$user_id .'</td><td>'.$massage_time.'</td><td>'.$user_email.'</td><td>'.$reason.'</td><td>'.$price .'</td><td>'.$created.' 
                    </td></tr>
                    </table>
                    </body>
                    </html>';
                    


					$subject = "Your Booking From Hamilton Massage Shop";

					$mail = new PHPMailer;
						//remove the Root User title when sending email
					$mail->From = "wangbin2018727@gmail.com";
					$mail->FromName = "Hamilton Massage Shop";


					$mail->isSMTP();
					$mail->Host = 'smtp.gmail.com';
					$mail->Port = 587;
					$mail->SMTPSecure = 'tls';
					$mail->SMTPAuth = true;
					$mail->Username = $email;
					$mail->Password = $password;
					$mail->addAddress($to_id);
					$mail->Subject = $subject;
					$mail->msgHTML($message);

					if (!$mail->send()) {
						$error = "Mailer Error: " . $mail->ErrorInfo;
						echo '<p id="para">'.$error.'</p>';
					}  
					else {
                        header("Location: user_profile.php");
					}

                
        	// header("Location: user_profile.php");
        }
        // else echo "didn't transfer";
}//if 
