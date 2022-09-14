<?php
   

 session_start();
   
 
 // Database connection
 include('database_connect.php');


if (isset($_POST['registerbtn']))
{
	$username = $_POST['username'];
	$name =  $_POST['name'];
	$dob = $_POST['dob'];
	$email =     $_POST['email'];
	$mobile =  $_POST['mobile'];
	$address =     $_POST['address'];
	$country =  $_POST['country'];
	$zip =     $_POST['zip'];
	$savings_balance = $_POST['savings_balance'];
	$checking_balance = $_POST['checking_balance'];
	$user_image = $_FILES["user_image"]['name'];
	$gender = $_POST['gender'];
	$marital_status = $_POST['marital_status'];
	$acc_type = $_POST['acc_type'];
	$password = $_POST['password'];
	$cpassword = $_POST['confirmpassword'];

		$sql = "SELECT * From users WHERE email = '{$email}' OR username = '{$username}' ";
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
           $_SESSION['status'] = "Either Username/Email already Exists.Try Something Else..";
	       header('location: open_account');

        }

     else 
     {
	
		if ($password === $cpassword) 
		{
			
			$username   = $connection->real_escape_string($_POST['username']);
			$name   = $connection->real_escape_string($_POST['name']);
			$dob   = $connection->real_escape_string($_POST['dob']);
			$email   = $connection->real_escape_string($_POST['email']);
			$mobile   = $connection->real_escape_string($_POST['mobile']);
			$address   = $connection->real_escape_string($_POST['address']);
			$country   = $connection->real_escape_string($_POST['country']);
			$zip   = $connection->real_escape_string($_POST['zip']);	
			$savings_balance   = $connection->real_escape_string($_POST['savings_balance']);
			$checking_balance   = $connection->real_escape_string($_POST['checking_balance']);
		    $user_image = $connection->real_escape_string($_FILES['user_image']['name']);
		    $gender = $connection->real_escape_string($_POST['gender']);
		    $marital_status = $connection->real_escape_string($_POST['marital_status']);
		    $acc_type = $connection->real_escape_string($_POST['acc_type']);
		    $password = $connection->real_escape_string($_POST['password']);
		    $cpassword = $connection->real_escape_string($_POST['confirmpassword']);


		    $validate_img_extension  = $_FILES["user_image"]['type']=="image/jpg" ||
									   $_FILES["user_image"]['type']=="image/png" ||
									   $_FILES["user_image"]['type']=="image/jpeg";

			if ($validate_img_extension) 
			{
				 if (file_exists("uploads/" . $_FILES["user_image"]["name"])) 
			     {
			    	$store = $_FILES["user_image"]["name"];
			    	$_SESSION['status'] = "Image already exists. '.$store.'";
			        header('location: open_account');
				 }
			   else
			   {

			    	// Random generated code to database
				    $otp    = mt_rand(1111, 9999);
				    $acc_pin    = rand(36894, 20175);
				    $account_no =rand(2841657903,5842361792);
				 
				    // Password hash
				    $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);


					$query  = "INSERT INTO users (username,name,dob,email,mobile,address,country,zip,account_no,savings_balance,checking_balance,user_image,gender,marital_status,acc_type,password,is_active,acc_pin,otp) VALUES ('$username','$name','$dob','$email','$mobile','$address','$country','$zip','$account_no','$savings_balance','$checking_balance','$user_image','$gender','$marital_status','$acc_type','$hashedPassword','0','$acc_pin','$otp')";
				    $result = $connection->query($query);

				    if ($result) 
				    {
				        //echo "yes";
				        move_uploaded_file($_FILES["user_image"]["tmp_name"], "uploads/".$_FILES["user_image"]["name"]);
		        		$_SESSION['success'] = "Offshore Banking Profile Created Successfully";
		        		header('location: open_account');

				    }
				    else
				    {
				        echo "<div class='alert alert-danger'>Not sent Error is:".$connection->error."</div>";
				    }    

			    } 
			}
			else
			{
				$_SESSION['status'] = "Only PNG, JPG, and JPEG images are allowed";
		        header('location: open_account');

			}

		}

		else
		{
			$_SESSION['status'] = "Password does not match";
		    header('location: open_account');
		}
	 
	}
	
	
    
	
}



if(isset($_POST['customerlogin_btn'])) 
    {
        $username_signin        = $_POST['username_signin'];
        $password_signin     = $_POST['password_signin'];

    

        // Query openig to the database
        $sql = "SELECT * From users WHERE username = '{$username_signin}' ";
        $query = mysqli_query($connection, $sql);
        $rowCount = mysqli_num_rows($query);

        // If query fails, show the reason 
        if(!$query)
        {
           die("SQL query failed: " . mysqli_error($connection));
        }

         // Check if User exist in database
        if($rowCount <= 0) 
        {
           $_SESSION['status'] = "Offshore Banking Profile Not Found";
	       header('location: login');

        } else 
           {
                // Fetch user data and store in php session
                	while($row = mysqli_fetch_array($query)) 
                {
                   
                                  
                    $id        = $row['id'];
                    $name = $row['name'];
                    $email = $row['email'];
                    $account_no = $row['account_no'];
					$user_name      = $row['username'];
					$pass_word = $row['password'];
					$is_active     = $row['is_active'];

            	}

	                // Verify password
	                $password = password_verify($password_signin, $pass_word);

				      // Allow only verified user
		
	    	if($is_active == '1') {
	    
			if($username_signin == $user_name && $password_signin == $password) 
	        {
	               header("Location: index");
	                       
	               $_SESSION['id'] = $id;
	               $_SESSION['account_no'] = $account_no;
	               $_SESSION['name'] = $name;
	               $_SESSION['email'] = $email;
	               $_SESSION['password'] = $password;
	               $_SESSION['username'] = $username;  
	               $_SESSION['is_active'] = $is_active;

	         $sql = "UPDATE customers SET lastactivity =now() WHERE id='".$_SESSION['id']."' LIMIT 1";
	         $result = mysqli_query($connection,$sql);       
	        
	        } 

         else {
                 $_SESSION['status'] = "Username/Password Not Match.";
	       		 header('location: login');
              }
                
		}else{
				$_SESSION['status'] = "Internet Banking Profile Locked.";
	       		 header('location: login');
			}
       
     }

 }


if(isset($_POST['customerlogin_btn2'])) 
    {
        $username_signin        = $_POST['username_signin'];
        $password_signin     = $_POST['password_signin'];

    

        // Query openig to the database
        $sql = "SELECT * From customers WHERE username = '{$username_signin}' ";
        $query = mysqli_query($connection, $sql);
        $rowCount = mysqli_num_rows($query);

        // If query fails, show the reason 
        if(!$query)
        {
           die("SQL query failed: " . mysqli_error($connection));
        }

         // Check if User exist in database
        if($rowCount <= 0) 
        {
           $_SESSION['status'] = "Sorry..Banking Profile Does Not Exist.";
           $_SESSION['status_code'] = "warning";
	       header('location: my-account');

        } else 
           {
                // Fetch user data and store in php session
                	while($row = mysqli_fetch_array($query)) 
                {
                   
                                  
                    $id        = $row['id'];
                    $name = $row['name'];
                    $email = $row['email'];
                    $account_no = $row['account_no'];
					$user_name      = $row['username'];
					$pass_word = $row['password'];
					$is_active     = $row['is_active'];

            	}

	                // Verify password
	                $password = password_verify($password_signin, $pass_word);

				      // Allow only verified user
		
	    	if($is_active == '1') {
	    
			if($username_signin == $user_name && $password_signin == $password) 
	        {
	               header("Location: processinglogin.php?dt=now()10f8sj%opwi7dgcjkspwjd&ns");
	                       
	               $_SESSION['id'] = $id;
	               $_SESSION['account_no'] = $account_no;
	               $_SESSION['name'] = $name;
	               $_SESSION['email'] = $email;
	               $_SESSION['password'] = $password;
	               $_SESSION['username'] = $username;  
	               $_SESSION['is_active'] = $is_active;

	         $sql = "UPDATE customers SET lastactivity =now() WHERE id='".$_SESSION['id']."' LIMIT 1";
	         $result = mysqli_query($connection,$sql);       
	        
	        } 

         else {
                 $_SESSION['status'] = "Username/Password Not Match.";
                 $_SESSION['status_code'] = "warning";
	       		 header('location: my-account');
              }
                
		}else{
				$_SESSION['status'] = "Internet Banking Profile Locked.";
				$_SESSION['status_code'] = "danger";
	       		header('location: my-account');
			}
       
     }

 }









?>