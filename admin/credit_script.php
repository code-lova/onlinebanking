<?php
ob_start();
session_start();
require_once('db_admin.php');
include('creditFunction.php');


//Mail script will go here.........






if(isset($_POST['transfer_btn']))
{	
			$acc_name = $_POST['acc_name'];
			$bank_name =  $_POST['bank_name'];
			$user_id =  $_POST['user_id'];
			$bank_addrs =     $_POST['bank_addrs'];
			$swift =  $_POST['swift'];
			$account_no =     $_POST['account_no'];
			$amount =  $_POST['amount'];
			$checking =     $_POST['checking'];
			$trac_type = $_POST['trac_type'];
			$email = $_POST['email'];

			$acc_name   = $connection->real_escape_string($_POST['acc_name']);
			$bank_name   = $connection->real_escape_string($_POST['bank_name']);
			$user_id   = $connection->real_escape_string($_POST['user_id']);
			$bank_addrs   = $connection->real_escape_string($_POST['bank_addrs']);
			$swift   = $connection->real_escape_string($_POST['swift']);
			$account_no   = $connection->real_escape_string($_POST['account_no']);
			$amount   = $connection->real_escape_string($_POST['amount']);
			$checking   = $connection->real_escape_string($_POST['checking']);
			$trac_type   = $connection->real_escape_string($_POST['trac_type']);
			$email   = $connection->real_escape_string($_POST['email']);
		    

	
			// Random reference no. to database
			 $reference = rand(103791, 769245);

			setBalance($amount,'credit',$_row['account_no']);
	
			$query = "INSERT INTO debits (acc_name,email,bank_name,bank_addrs,swift,account_no,amount,account_type,trac_type,reference,user_id,status) 
	VALUES ('$acc_name','$email','$bank_name','$bank_addrs','$swift','$account_no','$amount','$checking','$trac_type','$reference','$user_id','1')";
			$result = $connection->query($query);

			if ($result) 
			{
				 $_SESSION['status'] = "Customer credited Successfully..!!";
		         $_SESSION['status_code'] = "success";
		         header('location: customers');
			}
			else
			{
				$_SESSION['status'] = "Oops.. Somthing went wrong";
				$_SESSION['status_code'] = "danger";
		        header('location: customers');
			}
	
		//This fetch the data and prepare the function for snding email to the customer.
	
	

}

?>