
<?php
session_start();

include('db_admin.php');

	$id = $_GET['id'];

	
	$query ="UPDATE debits SET status='0' WHERE id='$id'";
	 $result = $connection->query($query);

	 if ($result) 
	    {
	       $_SESSION['status'] = "Customer did not complete the Transfer";
		   $_SESSION['status_code'] = "info"; 
	       header('location: debits');
	    }
	    else
	    {
	        $_SESSION['status'] = "Try again...Something Went Wrong";
			$_SESSION['status_code'] = "danger";
	        header('location: debits');
	    }    
	   


?>