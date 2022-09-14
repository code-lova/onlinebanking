<?php
ob_start();
session_start();
require_once('database_connect.php');
include('subFunction2.php');

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

	       header('location: personal_transfer');

        }
        else
        {
        	
			$acc_name = $_POST['acc_name'];
			$bank_name =  $_POST['bank_name'];
			$bank_addrs =     $_POST['bank_addrs'];
			$swift =  $_POST['swift'];
			$account_no =     $_POST['account_no'];
			$amount =  $_POST['amount'];
			$savings =     $_POST['savings'];
			$trac_type = $_POST['trac_type'];
			$email = $_POST['email'];

			$acc_name   = $connection->real_escape_string($_POST['acc_name']);
			$bank_name   = $connection->real_escape_string($_POST['bank_name']);
			$bank_addrs   = $connection->real_escape_string($_POST['bank_addrs']);
			$swift   = $connection->real_escape_string($_POST['swift']);
			$account_no   = $connection->real_escape_string($_POST['account_no']);
			$amount   = $connection->real_escape_string($_POST['amount']);
			$savings   = $connection->real_escape_string($_POST['savings']);
			$trac_type   = $connection->real_escape_string($_POST['trac_type']);
			$email   = $connection->real_escape_string($_POST['email']);
		    

	
			// Random reference no. to database
			 $reference = rand(103791, 769245);

			setBalance($amount,'debit',$_row['account_no']);
	
			$query = "INSERT INTO debits (acc_name,email,bank_name,bank_addrs,swift,account_no,amount,account_type,trac_type,reference,user_id,status) 
	VALUES ('$acc_name','$email','$bank_name','$bank_addrs','$swift','$account_no','$amount','$savings','$trac_type','$reference','$_SESSION[name]','1')";
			$result = $connection->query($query);

			if ($result) 
			{
				$_SESSION['success'] = "";
				header('location: verifypersonal.php?dt=2022557YUNBPBANK');
			}
			else
			{
				$_SESSION['status'] = "Oops...something went wrong";
				 header('location: personal_transfer');
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
	          header("Location: authenticate_personal.php?dt=2022jskeehduyejksjkjlm009YlskjkHGGEBADEXSEC6338ROXXCshgdpK");
	        }
	   else
			 {
			 	$_SESSION['status'] = "Sorry..Wrong Customer Account Pin.";
			 	header('location: authentication1.php?dt=2022jskeehduyejksjkjlm009YlskjkHGGEBA783ijdksexcieowireNKROXXA');
			 }

}







?>