<?php
session_start();

include('database_connect.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


function send_password_reset($get_email,$otp)
{

    $mail = new PHPMailer(true);                     //Enable verbose debug output
    $mail->isSMTP(); 
    $mail->SMTPAuth   = true; 
                                               
    $mail->Host       = "premium165.web-hosting.com";        //Set the SMTP server to send through         
    $mail->Username   = "support@bm-national.com";            //SMTP username
    $mail->Password   = "vivalasvegas1800";

    $mail->SMTPSecure = "ssl";            //Enable implicit TLS encryption
    $mail->Port       = 465;              //TCP port to connect to; use 587 if you have 

    //Recipients
    $mail->setFrom("support@bm-national.com");
    $mail->addAddress($get_email);               
    
    $mail->isHTML(true);
    $mail->Subject = "PASSWORD RESET REQUEST.";

    $email_template = "<center><h2>Your OTP Reset Code</h2>
    <h3>You are receiving this email cause we received a request for Password Reset on your account</h3>
    <br/><br/>
    <h4>Do not share this code.</h4>
    <hr>
    <p>OTP: $otp</p>
    <b>This code is valid for 24 hours</b>
    <br><br>
    <p>ACCESSIBILITY || CUSTOMER SUPPORT || PRIVACY POLICY || TERMS OF USE</p>
    <br>
    <p>©B&M NATIONAL</p></center>";
    

    $mail->Body = $email_template;
    $mail->send();        


}



if (isset($_POST['email_check_btn'])) 
{

	$email =  $connection->real_escape_string($_POST['email']);
	$otp    = mt_rand(1111, 9999);

	$sql = "SELECT email From users WHERE email = '{$email}' LIMIT 1 ";
	$query = mysqli_query($connection, $sql);
    $rowCount = mysqli_num_rows($query);

		// If query fails, show the reason 
        if(!$query)
        {
           die("SQL query failed: " . mysqli_error($connection));
        }

         // Check if email exist in database
     if($rowCount > 0)

	 {
	 	$row = mysqli_fetch_array($query);
        
        $get_email = $row['email'];

	 	$query ="UPDATE users SET otp='$otp' WHERE email = '{$email}' LIMIT 1 ";
	 	$result = $connection->query($query);

	 	if ($result) 
	 	{
	 		
            send_password_reset($get_email,$otp);
            
		 	session_start();
			$_SESSION['email'] =  $_POST['email'];
			header('location: passwordreset_form');
	 	}
	 	else
	 	{
		 	$_SESSION['status'] = "Oops OTP FAILED..!! ";
			header("location: reset");
			exit(0);
	 	}  		
		          
	} 
	else
	{
		$_SESSION['status'] = "Email is not recorgnized";
		header("location: reset");
		exit(0);
	}
}






if (isset($_POST['update_btn'])) 
{
	
	$postOtp = $_POST['otp'];
	$password = $_POST['password'];
	$cpassword = $_POST['confirmpassword'];

	$query  = "SELECT * FROM users WHERE otp = '$postOtp' AND email ='".$_SESSION['email']."' ";
	$result = $connection->query($query);

	if ($result->num_rows > 0) 
	{
		$query = "UPDATE users SET otp = '' WHERE email ='".$_SESSION['email']."'";
		$result =$connection->query($query);

	if ($result)
	{




		if ($password === $cpassword) 
		{
			

			$password = $connection->real_escape_string($_POST['password']);
			$cpassword = $connection->real_escape_string($_POST['confirmpassword']);

			// Password hash
			$hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

			$query ="UPDATE users SET password='$hashedPassword' WHERE email ='".$_SESSION['email']."' ";
			$result = $connection->query($query);

			 if ($result) 
			    {
			        //echo "yes";
			        $_SESSION['success'] = "Password Udated Successfully..!!";
			        header('location: passwordreset_form');
			    }
			    else
			    {
			        $_SESSION['status'] = "Password was NOT Udated";
			        header('location: passwordreset_form');
			    }    
			}
			
			else
			{
				$_SESSION['status'] = "Password Does Not Match";
			    header('location: passwordreset_form');
			}

		}

	}
	else
	{
		$_SESSION['status'] = "OTP code is Invalid..";
	    header('location: passwordreset_form');
	}	



}





?>