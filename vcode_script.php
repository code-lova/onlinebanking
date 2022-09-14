<?php
session_start();

include('database_connect.php');



if (isset($_POST['vcode_btn'])) 
{
	
	$postOtp = $_POST['vcode'];
	
	$query  = "SELECT * FROM users WHERE otp = '$postOtp' LIMIT 1";
	$result = $connection->query($query);

	if ($result->num_rows > 0)
	{
		//echo "yes";
		header('location: success');
	}
	else
	{
		$_SESSION['status'] = "Verification code is Invalid..";
	    header('location: verify_account');
	}	
}


?>