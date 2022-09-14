
<?php
session_start();

include('db_admin.php');

	$id = $_GET['id'];

	
	$query ="UPDATE kycdoc SET status='1' WHERE id='$id'";
	 $result = $connection->query($query);

	 if ($result) 
	    {
	       $_SESSION['status'] = "Customer KYC Verified Successfully.";
		   $_SESSION['status_code'] = "success";
	        header('location: kyc');
	    }
	    else
	    {
	        $_SESSION['status'] = "Try again...STILL NOT Verified ";
		    $_SESSION['status_code'] = "danger";
	        header('location: kyc');
	    }    
	   


?>