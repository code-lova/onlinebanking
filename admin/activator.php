
<?php
session_start();

include('db_admin.php');

	$id = $_GET['id'];

	
	$query ="UPDATE users SET is_active='1' WHERE id='$id'";
	 $result = $connection->query($query);

	 if ($result) 
	    {
	       $_SESSION['status'] = "Customer Profile has been Activated";
		   $_SESSION['status_code'] = "success";
	       header('location: activate_customer');
	    }
	    else
	    {
	        $_SESSION['status'] = "Customer Profile was not Activated";
		    $_SESSION['status_code'] = "danger";
	        header('location: activate_customer');
	    }    
	   


?>