<?php

 session_start();
   
 
 // Database connection
 require_once('db_admin.php');

 if (isset($_POST['reg_admin'])) 
 {
 	$name = $_POST['username'];
	$email =     $_POST['email'];
	$password = $_POST['password'];
	$cpassword = $_POST['confirmpassword'];

	if ($password === $cpassword) 
		{
			
			
			$name   = $connection->real_escape_string($_POST['name']);
			$email   = $connection->real_escape_string($_POST['email']);
		    $password = $connection->real_escape_string($_POST['password']);
		    $cpassword = $connection->real_escape_string($_POST['confirmpassword']);
				 
				    // Password hash
				    $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

					$query  = "INSERT INTO admin (name,email,password) VALUES ('$name','$email','$hashedPassword')";
				    $result = $connection->query($query);

				    if ($result) 
				    {
				      
		        		header('location: index');
				    }
				    else
				    {
				        echo "<div class='alert alert-danger'>Not sent Error is:".$connection->error."</div>";
				    }    

		}

		else
		{
			$_SESSION['status'] = "Password does not match";
		    header('location: admin_reg');
		}

}




?>