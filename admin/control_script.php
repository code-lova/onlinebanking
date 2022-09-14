<?php
   

 session_start();
   
 
 // Database connection
 include('db_admin.php');


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

		$sql = "SELECT * From users WHERE email = '{$email}' ";
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
           $_SESSION['status'] = "Email has already been taken..";
           $_SESSION['status_code'] = "danger";
	       header('location: add_customer');

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
				 if (file_exists("../uploads/" . $_FILES["user_image"]["name"])) 
			     {
			    	$store = $_FILES["user_image"]["name"];
			    	$_SESSION['status'] = "Image already exists. '.$store.'";
				    $_SESSION['status_code'] = "warning";
			        header('location: add_customer');
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
				        move_uploaded_file($_FILES["user_image"]["tmp_name"], "../uploads/".$_FILES["user_image"]["name"]);
		        		$_SESSION['status'] = "User Profile Added Successfully..";
				        $_SESSION['status_code'] = "success";
		        		header('location: add_customer');

				    }
				    else
				    {
				        $_SESSION['status'] = "Customer Profile Not Added.";
				        $_SESSION['status_code'] = "danger";
		        		header('location: add_customer');
				    }    

			    } 
			}
			else
			{
				$_SESSION['status'] = "Only PNG, JPG, and JPEG images are allowed";
				$_SESSION['status_code'] = "warning";
		        header('location: add_customer');

			}

		}

		else
		{
			$_SESSION['status'] = "Password does not match";
			$_SESSION['status_code'] = "danger";
		    header('location: add_user');
		}
	 
	}
	
}







if (isset($_POST['updatebtn']))
{
	$id 		= $_POST['edit_id'];
	$username = $_POST['edit_username'];
	$name =  $_POST['edit_name'];
	$email =     $_POST['edit_email'];
	$mobile =  $_POST['edit_mobile'];
	$address =     $_POST['edit_address'];
	$country =  $_POST['edit_country'];
	$zip =     $_POST['edit_zip'];
	$savings_balance =     $_POST['edit_savings_balance'];
	$checking_balance = $_POST['edit_checking_balance'];
	$marital_status= $_POST['edit_marital_status'];
	$gender = $_POST['edit_gender'];	
	$acc_type = $_POST['edit_acc_type'];
	$created = $_POST['edit_created'];
	$acc_pin = $_POST['edit_acc_pin'];
	$dob = $_POST['edit_dob'];
	
	

	$query ="UPDATE users SET username='$username', name='$name', email='$email', mobile='$mobile', address='$address', country='$country', zip='$zip', savings_balance='$savings_balance', checking_balance='$checking_balance', marital_status='$marital_status', gender='$gender', acc_type='$acc_type', created='$created', acc_pin='$acc_pin', dob='$dob' WHERE id='$id' ";
	 $result = $connection->query($query);

	 if ($result) 
	    {
	        //echo "yes";
	        $_SESSION['status'] = "Customer data Updated Successfully..!!";
	        $_SESSION['status_code'] = "success";
	        header('location: customers');
	        
	    }
	    else
	    {	
	    	$_SESSION['status'] = "Customer data NOT Updated";
			$_SESSION['status_code'] = "danger";
	        header('location: customers');
	        
	    }    

}




if (isset($_POST['del_cust_btn']))
	{
		$id = $_POST['delete_cust_id'];

		$query = "DELETE FROM users WHERE id='$id' ";
		$result = $connection->query($query);

		if ($result) 
	    {
	        //echo "yes";
	        $_SESSION['status'] = "Customer has been deleted Successfully";
	        $_SESSION['status_code'] = "success";
	        header('location: customers');
	        
	    }
	    else
	    {
	        $_SESSION['status'] = "Sorry Customer is not deleted ";
	        $_SESSION['status_code'] = "danger";
	        header('location: customers');
	        
	    } 


	}




if (isset($_POST['sendmsg_btn'])) 
{
	

	if ($connection->query("insert into message (subject,department,message,user_id) values ('$_POST[subject]','$_POST[department]','$_POST[message]','$_POST[notice_id]')"))
	 			{
			       $_SESSION['status'] = "Customer Messasge sent Successfully ";
				   $_SESSION['status_code'] = "success";
				  header('location: message');
	    		}else
			     echo "<div class='alert alert-danger'>Not sent Error is:".$connection->error."</div>";




}

if (isset($_POST['update_debit_btn']))
{
	$id 		= $_POST['edit_debit_id'];
	$acc_name = $_POST['edit_acc_name'];
	$bank_name =  $_POST['edit_bank_name'];
	$bank_addrs =     $_POST['edit_bank_addrs'];
	$swift =  $_POST['edit_swift'];
	$account_no =     $_POST['edit_account_no'];
	$amount =  $_POST['edit_amount'];
	$email =  $_POST['edit_email'];
	$trac_type =  $_POST['edit_trac_type'];
	$reference =  $_POST['edit_reference'];
	$created= $_POST['edit_created'];

	$query ="UPDATE debits SET acc_name='$acc_name', bank_name='$bank_name', bank_addrs='$bank_addrs', swift='$swift', account_no='$account_no', amount='$amount', email='$email', trac_type='$trac_type', reference='$reference', created='$created' WHERE id='$id' ";
	 $result = $connection->query($query);

	 if ($result) 
	    {
	        //echo "yes";
	        $_SESSION['status'] = "Debit Data Updated Successfully..";
			$_SESSION['status_code'] = "success";

	        header('location: debits');
	    }
	    else
	    {
	        echo "<div class='alert alert-danger'>Not sent Error is:".$connection->error."</div>";
	    }    

}





if (isset($_POST['del_debit_btn']))
	{
		$id = $_POST['del_debit_id'];

		$query = "DELETE FROM debits WHERE id='$id' ";
		$result = $connection->query($query);

		if ($result) 
	    {
	        //echo "yes";
	        $_SESSION['status'] = "Customer Debit deleted Successfully";
	        header('location: debits');
	        
	    }
	    else
	    {
	        $_SESSION['status'] = "Customer Debit was not deleted ";
	        header('location: debits');
	        
	    } 


	}




if (isset($_POST['delete_ticket_btn']))
	{
		$id = $_POST['delete_ticket_id'];

		$query = "DELETE FROM ticket WHERE ticket_id='$id' ";
		$result = $connection->query($query);

		if ($result) 
	    {
	        //echo "yes";
	        $_SESSION['status'] = "Ticket was Deleted Successfully..";
	        header('location: tickets');
	        
	    }
	    else
	    {
	        $_SESSION['status'] = "Ticket was not Deleted try again.";
	        header('location: tickets');
	        
	    } 
	}




if (isset($_POST['del_mesg_btn']))
	{
		$id = $_POST['del_mesg_id'];

		$query = "DELETE FROM message WHERE message_id='$id' ";
		$result = $connection->query($query);

		if ($result) 
	    {
	        //echo "yes";
	        $_SESSION['status'] = "Sent Message was deleted Successfully.";
	        header('location: message');
	        
	    }
	    else
	    {
	        $_SESSION['status'] = "Sent Message not deleted Successfully.";
	        header('location: message');
	        
	    } 
	}





if (isset($_POST['updateconfirm_btn']))
{
	
	$id = $_POST['updatebtc_id'];
	$status = $_POST['edit_confirmation'];

	$query ="UPDATE crypto_debits SET confirmations='$status' WHERE id='$id'";

	$result = $connection->query($query);


	if ($result) 
	    {
	        //echo "yes";
	        $_SESSION['status'] = "Crypto Confirmation Updated Successfully.";
	        $_SESSION['status_code'] = "success";
	        header('location: wallet');
	        
	    }
	    else
	    {	
	    	echo "<div class='alert alert-danger'>Not sent Error is:".$connection->error."</div>";
	        
	    }    

}





if (isset($_POST['del_confirmation_btn']))
	{
		$id = $_POST['del_confirmation_id'];

		$query = "DELETE FROM crypto_debits WHERE id='$id' ";
		$result = $connection->query($query);

		if ($result) 
	    {
	        //echo "yes";
	        $_SESSION['status'] = "Crypto-debit deleted Successfully.";
	        header('location: wallet');
	        
	    }
	    else
	    {
	        $_SESSION['status'] = "Crypto-debit Confirmation NOT deleted";
	        header('location: wallet');
	        
	    } 


	}




if (isset($_POST['delconmsg_btn']))
	{
		$id = $_POST['delconmsg_id'];

		$query = "DELETE FROM contact WHERE id='$id' ";
		$result = $connection->query($query);

		if ($result) 
	    {
	        //echo "yes";
	        $_SESSION['status'] = "Contact message deleted Successfully.";
	        header('location: request');
	        
	    }
	    else
	    {
	        $_SESSION['status'] = "There was a making the delete command.";
	        header('location: request');
	        
	    } 


	}



if (isset($_POST['dellonemsg_btn']))
	{
		$id = $_POST['dellonemsg_id'];

		$query = "DELETE FROM loan WHERE id='$id' ";
		$result = $connection->query($query);

		if ($result) 
	    {
	        //echo "yes";
	        $_SESSION['status'] = "Loan message deleted Successfully.";
	        header('location: loan_request');
	        
	    }
	    else
	    {
	        $_SESSION['status'] = "There was a making the delete command.";
	        header('location: loan_request');
	        
	    } 


	}






?>