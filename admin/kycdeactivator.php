
<?php
session_start();

include('db_admin.php');

	$id = $_GET['id'];

	
	$query ="UPDATE kycdoc SET status='0' WHERE id='$id'";
	 $result = $connection->query($query);

	 if ($result) 
	    {
	       $_SESSION['status'] = "Customer KYC is now Unverified..";
		   $_SESSION['status_code'] = "success";
	        header('location: kyc');
	    }
	    else
	    {
	        $_SESSION['status'] = "Oops...something is wrong";
		    $_SESSION['status_code'] = "danger";
	        header('location: kyc');
	    }    
	   


?>