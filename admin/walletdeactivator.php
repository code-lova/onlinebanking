
<?php
session_start();

include('db_admin.php');

	$id = $_GET['id'];

	
	$query ="UPDATE customers SET wallet_status='0' WHERE id='$id'";
	 $result = $connection->query($query);

	 if ($result) 
	    {
	       $_SESSION['status'] = "Customer wallet is now Deactivated..";
		   $_SESSION['status_code'] = "success";
	        header('location: wallet_activator');
	    }
	    else
	    {
	        $_SESSION['status'] = "Oops...something is wrong";
		    $_SESSION['status_code'] = "danger";
	        header('location: wallet_activator');
	    }    
	   


?>