
<?php
session_start();

include('db_admin.php');

	$id = $_GET['id'];

	
	$query ="UPDATE ticket SET status='1' WHERE ticket_id='$id'";
	 $result = $connection->query($query);

	 if ($result) 
	    {
	       $_SESSION['status'] = "This message is now marked as READ";
	       $_SESSION['status_tle'] = "Perfect..";
		   $_SESSION['status_code'] = "success";
	        header('location: tickets');
	    }
	    else
	    {
	        $_SESSION['status'] = "Oops...STILL NOT READ";
	        $_SESSION['status_tle'] = "Sorry..";
			$_SESSION['status_code'] = "error";
	        header('location: tickets');
	    }    
	   


?>