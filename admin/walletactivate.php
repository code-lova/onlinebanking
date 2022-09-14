
<?php
session_start();

include('db_admin.php');

	$id = $_GET['id'];

	
	$query ="UPDATE customers SET wallet_status='1' WHERE id='$id'";
	 $result = $connection->query($query);

	 if ($result) 
	    {
	       $_SESSION['status'] = "Customer wallet Activated Successfully.";
		   $_SESSION['status_code'] = "success";
	        header('location: wallet_activator');
	    }
	    else
	    {
	        $_SESSION['status'] = "Try again...STILL NOT Verified ";
		    $_SESSION['status_code'] = "danger";
	        header('location: wallet_activator');
	    }    
	   


?>