
<?php
session_start();

include('db_admin.php');

	$id = $_GET['id'];

	
	$query ="UPDATE ticket SET status='0' WHERE ticket_id='$id'";
	 $result = $connection->query($query);

	 if ($result) 
	    {
	       $_SESSION['status'] = "This message is now marked as UNREAD";
	       $_SESSION['status_tle'] = "Perfect..";
		   $_SESSION['status_code'] = "success";
	        header('location: tickets');
	    }
	    else
	    {
	        $_SESSION['status'] = "Oops...something is wrong";
	        $_SESSION['status_tle'] = "Perfect..";
		    $_SESSION['status_code'] = "error";
	        header('location: tickets');
	    }    
	   


?>