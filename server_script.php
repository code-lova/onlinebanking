<?php
   

 session_start();
   
 
 // Database connection
 include('database_connect.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


function send_customer_email($get_email,$get_name,$get_acc_pin,$get_account_no,$get_mobile,$get_otp)
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
    $mail->Subject = "Customer Banking Profile Created Successfully.";

    $email_template = "<center><h4>You have successfully opened a new Offshore Banking Profile with B&M NATIONAL BANK. </h4>
    <h4>Below are your Account and login details respectively.</h4>
    
    <p>Account Name: $get_name</p>
    <p>Account.No: $get_account_no</p>
    <p>password: Use password during registration</p>
    <p>Account PIN: $get_acc_pin</>
    <p>Customer Email: $get_email</p>
    <p>Phone.No: $get_mobile</p>
    <p>Verification Code: $get_otp</p>
    <p>Account Type: Offshore Merge</p>
    <hr>
    <p>Having any complains ? let us know, send us a ticket or a quick message to chat with our Customer Care.</p>
    <br>
    <p>For Enquiry, questions or complains, reach us at support@bm-national.com or open a ticket directly from your mobile internet banking and a customer care agent will get across to you ASAP</>
    <br><br>
    <p>ACCESSIBILITY || CUSTOMER SUPPORT || PRIVACY POLICY || TERMS OF USE</p>
    <br>
    <p>©B&N NATIONAL Bank</p>
    </center> ";
    

    $mail->Body = $email_template;
    $mail->send();        


}



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
		        		header('location: verify_account');

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
	
	
	$sql = "SELECT * From users WHERE email = '{$email}' LIMIT 1 ";
    $query = mysqli_query($connection, $sql);
    $rowCount = mysqli_num_rows($query);

        // If query fails, show the reason 
        if(!$query)
        {
           die("SQL query failed: " . mysqli_error($connection));
        }

    if ($rowCount > 0)
    {
        $row = mysqli_fetch_array($query);
        
        
        $get_email = $row['email'];
        $get_name = $row['name'];
        $get_acc_pin = $row['acc_pin'];
        $get_account_no = $row['account_no'];
        $get_mobile = $row['mobile'];
        $get_otp = $row['otp'];
        

        send_customer_email($get_email,$get_name,$get_acc_pin,$get_account_no,$get_mobile,$get_otp);
    }
    else
    {
        echo "Could not fetch data";
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
	               header("Location: customer/index");
	                       
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