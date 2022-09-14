
<?php
ob_start();
session_start();
require_once('database_connect.php');
	
	 $query ="UPDATE debits SET status='1' WHERE user_id='{$_SESSION['name']}' AND status='0'";
	 $result = $connection->query($query);

	 if ($result) 
	    {
	       $_SESSION['success'] = "Your wire Transfer was Successful..";
	       header('location: history');
	    }
	    else
	    {
	        $_SESSION['status'] = "Oops...Something is Wrong";
	        header('location: transfercomplete');
	    }    
	   


?>