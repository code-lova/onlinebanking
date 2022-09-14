<?php
session_start();

include('db_admin.php');

	
	$query ="UPDATE loan SET status='1'";
	 $result = $connection->query($query);

	 if ($result) 
	    {
	       $_SESSION['success'] = "";
	        header('location: loan_request');
	    }
	    else
	    {
	        echo "<div class='alert alert-danger'>Somethings wrong:".$connection->error."</div>";
	    }    
	   


?>