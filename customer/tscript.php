<?php
ob_start();
session_start();
require_once('database_connect.php');
include('subFunction.php');


//Mail script will go here.........

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


function send_debit_email($get_email,$get_acc_name,$get_bank_name,$get_account_no,$get_account_type,$get_trac_type,$get_amount,$get_reference)
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
    $mail->Subject = "Debit Alert.!!";

    $email_template = "<center>B&M NATIONAL BANK<p><h2>DEBIT TRANSACTION</h2></p> </center>
    <h3>Your Bank Account Was Debited: Below are details of the transaction.</h3>
    <p>Accout Name: $get_acc_name</p>
    <p>Bank Name: $get_bank_name</p>
    <p>Account.No: $get_account_no</p>
    <p>From: $get_account_type</p>
    <p>Amount sent:$ $get_amount</p>
    <p>Type: $get_trac_type  </p>
    <P>Reference:#$get_reference</P>
    <hr>
    <center>
    <p>Having any complains ? let us know, send us a ticket or a quick message to chat with our Customer Care.</p>
    <br><br>
    <p>For Enquiry, questions or complains, reach us at support@bm-national.com or open a ticket directly from your mobile internet banking and a customer care agent will get across to you ASAP</p>
    <br>
    <p>ACCESSIBILITY || CUSTOMER SUPPORT || PRIVACY POLICY || TERMS OF USE</p>
    <br>
    <p>©B&M NATIONAL</p>
    </center> ";
    

    $mail->Body = $email_template;
    $mail->send();        


}




if(isset($_POST['transfer_btn']))
{

	$sql = "SELECT * From kycdoc WHERE user_id = '{$_SESSION['id']}' AND status='1' ";
    $query = mysqli_query($connection, $sql);
    $rowCount = mysqli_num_rows($query);

        // If query fails, show the reason 
        if(!$query)
        {
           die("SQL query failed: " . mysqli_error($connection));
        }

        if($rowCount <= 0)
        {
        	$_SESSION['status'] = "KYC Verification is Required to continue.";
	       header('location: business_transfer');

        }
        else
        {
        	
			$acc_name = $_POST['acc_name'];
			$bank_name =  $_POST['bank_name'];
			$bank_addrs =     $_POST['bank_addrs'];
			$swift =  $_POST['swift'];
			$account_no =     $_POST['account_no'];
			$amount =  $_POST['amount'];
			$checking =     $_POST['checking'];
			$trac_type = $_POST['trac_type'];
			$email = $_POST['email'];

			$acc_name   = $connection->real_escape_string($_POST['acc_name']);
			$bank_name   = $connection->real_escape_string($_POST['bank_name']);
			$bank_addrs   = $connection->real_escape_string($_POST['bank_addrs']);
			$swift   = $connection->real_escape_string($_POST['swift']);
			$account_no   = $connection->real_escape_string($_POST['account_no']);
			$amount   = $connection->real_escape_string($_POST['amount']);
			$checking   = $connection->real_escape_string($_POST['checking']);
			$trac_type   = $connection->real_escape_string($_POST['trac_type']);
			$email   = $connection->real_escape_string($_POST['email']);
		    

	
			// Random reference no. to database
			 $reference = rand(103791, 769245);

			setBalance($amount,'debit',$_row['account_no']);
	
			$query = "INSERT INTO debits (acc_name,email,bank_name,bank_addrs,swift,account_no,amount,account_type,trac_type,reference,user_id,status) 
	VALUES ('$acc_name','$email','$bank_name','$bank_addrs','$swift','$account_no','$amount','$checking','$trac_type','$reference','$_SESSION[name]','0')";
			$result = $connection->query($query);

			if ($result) 
			{
				$_SESSION['success'] = "";
				header('location: verifybusiness');
			}
			else
			{
				$_SESSION['status'] = "Oops...something went wrong";
				
				 header('location: business_transfer');
			}
			    
		} 
	
			//This fetch the data and prepare the function for snding email to the customer.
		
		$sql = "SELECT * From debits WHERE email = '{$email}' ORDER BY id DESC LIMIT 1 ";
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
        $get_acc_name = $row['acc_name'];
        $get_bank_name = $row['bank_name'];
        $get_account_no = $row['account_no'];
        $get_account_type = $row['account_type'];
        $get_trac_type = $row['trac_type'];
        $get_amount = $row['amount'];
        $get_reference = $row['reference'];
        

        send_debit_email($get_email,$get_acc_name,$get_bank_name,$get_account_no,$get_account_type,$get_trac_type,$get_amount,$get_reference);
    }
    else
    {
        echo "Could not fetch data";
    }

	
	

}


if (isset($_POST['pbutton1'])) 
{
	$id 		= $_POST['edit_id'];
	$name =  $_POST['edit_name'];

	$query ="UPDATE users SET name='$name' WHERE id='".$_SESSION['id']."' ";
	 $result = $connection->query($query);

	 if ($result) 
	    {
	        //echo "yes";
	        $_SESSION['success'] = "Profile was Updated Successfully...!! ";
	        header('location: logout');
	    }
	    else
	    {
	        $_SESSION['status'] = "User profile NOT Updated";
	        header('location: settings');
	    }    	
}


if (isset($_POST['update_user']))
{
	$id 		= $_POST['edit_id'];
	$username = $_POST['edit_username'];
	$email= $_POST['edit_email'];	
	$dob = $_POST['edit_dob'];
	$mobile =  $_POST['edit_mobile'];
	$address =     $_POST['edit_address'];
	$country =  $_POST['edit_country'];
	$zip =     $_POST['edit_zip'];
	

	$query ="UPDATE users SET username='$username', email='$email', dob='$dob', mobile='$mobile', address='$address', country='$country', zip='$zip' WHERE id='".$_SESSION['id']."' ";
	 $result = $connection->query($query);

	 if ($result) 
	    {
	        //echo "yes";
	        $_SESSION['success'] = "Profile was Updated Successfully...!! ";
	        header('location: settings');
	    }
	    else
	    {
	        $_SESSION['status'] = "User profile NOT Updated";
	        header('location: settings');
	    }    

}




if (isset($_POST['update_user_password']))
{
	
	$oldpassword     = $_POST['oldpassword'];


	$sql = "SELECT * FROM users WHERE id = '{$_SESSION['id']}'";
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
           $_SESSION['status'] = "Account Does Not Exist";
	       header('location: settings');

        }
		else 
           {
                // Fetch user data and store in php session
                	while($row = mysqli_fetch_array($query)) 
                {
                                  
                    $id        = $row['id'];
					$pass_word = $row['password'];		
            	}


				 $password = password_verify($oldpassword, $pass_word);

					if($oldpassword == $password) 
					{
						
						$newpassword = $_POST['newpassword'];
						$confirmpassword = $_POST['confirmpassword'];


						if ($newpassword === $confirmpassword) 
						{
						

						$newpassword = $connection->real_escape_string($_POST['newpassword']);
						$confirmpassword = $connection->real_escape_string($_POST['confirmpassword']);

						// Password hash
						$hashedPassword = password_hash($_POST['newpassword'], PASSWORD_DEFAULT);

						$query ="UPDATE users SET password='$hashedPassword' WHERE id ='".$_SESSION['id']."' ";
						 $result = $connection->query($query);

						 if ($result) 
						    {
						        //echo "yes";
						        $_SESSION['success'] = "Customer Password Udated Successfully..!!";
						        header('location: logout');
						    }
						    else
						    {
						        $_SESSION['status'] = "customer Password Fail to Udated";
						        header('location: settings');
						    }    
						}
						
						else
						{
							$_SESSION['status'] = "Sorry..New/Old Password Does Not Match";
						    header('location: settings');
						}

					}
					else
					{
							$_SESSION['status'] = "Sorry..Old Password is not valid..Try again";
						    header('location: settings');
					}
			}

}








if(isset($_POST['pin_btn']))
{

 $acc_pin = $_POST['acc_pin'];

		$sql = "SELECT * From users WHERE id = '{$_SESSION['id']}' ";
        $query = mysqli_query($connection, $sql);
        $rowCount = mysqli_num_rows($query);


      // If query fails, show the reason 
        if(!$query)
        {
           die("SQL query failed: " . mysqli_error($connection));
        }

        while($row = mysqli_fetch_array($query)) 
       	{                   
  			$id        = $row['id'];
            $pin_code = $row['acc_pin'];
      	 }

       if($acc_pin == $pin_code) 
	        {
	          header("Location: transfer-in-progressa.php?dt=2022jskeehduyejksjkjlm009YlskjkHGGEBADEXSEC633BANK");
	        }
	   else
			 {
			 	$_SESSION['status'] = "Sorry..Wrong Customer Account Pin.";
			 	header('location: authentication2.php?dt=2022jskeehduyejksjkjlm009YlskjkHGGEBA783ijdksexcieowireNKRO');
			 }

}




if(isset($_POST['imf_btn']))
{

 $imf = $_POST['imf'];

		$sql = "SELECT * From payment1 WHERE imf = '{$imf}' ";
        $query = mysqli_query($connection, $sql);
        $rowCount = mysqli_num_rows($query);


      // If query fails, show the reason 
        if(!$query)
        {
           die("SQL query failed: " . mysqli_error($connection));
        }

        while($row = mysqli_fetch_array($query)) 
       	{                   
  			$id        = $row['id'];
            $imf_code = $row['imf'];
      	 }

       if($imf == $imf_code) 
	        {
	          header("Location: cot.php?dt=2022jskeehduyejksj77sjSHUHYOPDGdoorjaxxcsROXzaaw9122C633");
	        }
	   else
			 {
			 	$_SESSION['status'] = "Oops..Sorry..Invalid Customer IMF Code.";
			 	header('location: imf.php?dt=2022jkoldbskovibbgSCwarjksjkjlm009YlskjkHGGEB63ehhishssh638xcls');
			 }

}




if(isset($_POST['cot_btn']))
{

 $cot = $_POST['cot'];

		$sql = "SELECT * From payment3 WHERE cot = '{$cot}' ";
        $query = mysqli_query($connection, $sql);
        $rowCount = mysqli_num_rows($query);


      // If query fails, show the reason 
        if(!$query)
        {
           die("SQL query failed: " . mysqli_error($connection));
        }

        while($row = mysqli_fetch_array($query)) 
       	{                   
  			$id        = $row['id'];
            $cot_code = $row['cot'];
      	 }

       if($cot == $cot_code) 
	        {
	          header("Location: transfer-in-progressb.php?dt=2022yq8jkoxxcs6373SDBANKSwwdscxxl89202wnisshbncjksch");
	        }
	   else
			 {
			 	$_SESSION['status'] = "Oops..Sorry Invalid Customer COT code.";
			 	header('location: cot.php?dt=2022jskeehduyejksj77sjSHUHYOPDGdoorjaxxcsROXzaaw9122C633');
			 }

}


if(isset($_POST['ipn_btn']))
{

 $ipn = $_POST['ipn'];

		$sql = "SELECT * From payment2 WHERE ipn = '{$ipn}' ";
        $query = mysqli_query($connection, $sql);
        $rowCount = mysqli_num_rows($query);


      // If query fails, show the reason 
        if(!$query)
        {
           die("SQL query failed: " . mysqli_error($connection));
        }

        while($row = mysqli_fetch_array($query)) 
       	{                   
  			$id        = $row['id'];
            $ipn_code = $row['ipn'];
      	 }

       if($ipn == $ipn_code) 
	        {
	          header("Location: transfer-in-progressc.php?dt=2022yqs7ysshROXXaaxieouxiccvsecUR34748ssrsdkchghqw");
	        }
	   else
			 {
			 	$_SESSION['status'] = "Oops..Sorry Invalid Customer IPN Code.";
			 	header('location: ipn.php?dt=2022yqs7ysshROXXaaxieouxSHNEI8830pxcyssrssclkgrul');
			 }

}






if (isset($_POST['message_btn']))
{
	
   	$sql = "SELECT * From ticket WHERE user_id = '{$_SESSION['id']}' ";
        $query = mysqli_query($connection, $sql);
        $rowCount = mysqli_num_rows($query);

        // If query fails, show the reason 
        if(!$query)
        {
           die("SQL query failed: " . mysqli_error($connection));
        }

        if($rowCount > 0)
        {
        	$_SESSION['status'] = "You can only reply to an open ticket.";
  
	       header('location: settings-support');

        }
        else
        {
        	
        	 $subject   = $connection->real_escape_string($_POST['subject']);
			 $message   = $connection->real_escape_string($_POST['message']);

        	 
        	if ($connection->query("insert into ticket (subject,message,user_id,status,subject_id,attachment) values ('$_POST[subject]','$_POST[message]','$_SESSION[id]','0','$_POST[subject_id]','$_POST[attachment]')"))
	 			{
	 			  
			      $_SESSION['success'] = "Your Message sent Successfully. ";
				  header('location: settings-support');
	    		}else
			    echo "<div class='alert alert-danger'>Not sent Error is:".$connection->error."</div>";

			
		}
 }





if (isset($_POST['send_btn'])) 
{
	

		$sql = "SELECT * From ticket WHERE user_id = '{$_SESSION['id']}' ";
        $query = mysqli_query($connection, $sql);
        $rowCount = mysqli_num_rows($query);

        // If query fails, show the reason 
        if(!$query)
        {
           die("SQL query failed: " . mysqli_error($connection));
        }

        if($rowCount <= 0)
        {
        	$_SESSION['status'] = "You need to open a ticket before replying.";
	        header('location: open_ticket');

        }
    else
    {
        	 $attachment = $_FILES["attachment"]['name'];

        	 $attachment = $connection->real_escape_string($_FILES['attachment']['name']);
        	 $subject   = $connection->real_escape_string($_POST['subject']);
			 $reply_message   = $connection->real_escape_string($_POST['reply_message']);

			 $validate_img_extension  = $_FILES["attachment"]['type']=="image/jpg" ||
									   $_FILES["attachment"]['type']=="image/png" ||
									   $_FILES["attachment"]['type']=="image/jpeg" ||
									   $_FILES["attachment"]['type']=="application/pdf";

				 

	       if ($connection->query("insert into ticket (subject,message,user_id,status,subject_id,attachment) values ('$_POST[subject]','$_POST[reply_message]','$_SESSION[id]','0','$_POST[subject_id]','$attachment')")) 
		  	{
		  	 move_uploaded_file($_FILES["attachment"]["tmp_name"], "../files/".$_FILES["attachment"]["name"]);

	        $_SESSION['success'] = "Sent Successfully.. Check Messages for Reply ";
			header('location: settings-support');
	     	 }
	      	else
	      	{
	      	echo "<div class='alert alert-danger'>Not sent Error is:".$connection->error."</div>";
	      	}

    }	
}




	
if (isset($_POST['delete_ticket']))
	{
		$id = $_POST['delete_user_id'];

		$query = "DELETE FROM ticket WHERE user_id ='".$_SESSION['id']."' ";
		$result = $connection->query($query);

		if ($result) 
	    {
	        //echo "yes";
	        $_SESSION['success'] = "Ticket have been closed Successfully.";
	        header('location: settings-support');
	        
	    }
	    else
	    {
	        $_SESSION['status'] = "Ticket have not been closed.";
	        header('location: settings-support');
	        
	    } 


	}










?>