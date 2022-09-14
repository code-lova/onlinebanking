
<?php
session_start();

include('db_admin.php');

	$id = $_GET['id'];

	
	$query ="UPDATE debits SET status='2' WHERE id='$id'";
	 $result = $connection->query($query);

	 if ($result) 
	    {
	       $_SESSION['status'] = "Transfer is now Cancelled Successfully";
		   $_SESSION['status_code'] = "success";
	       header('location: debits');
	    }
	    else
	    {
	        $_SESSION['status'] = "Try again...Something is Wrong ";
			$_SESSION['status_code'] = "danger";
	        header('location: debits');
	    }    
	   


?>