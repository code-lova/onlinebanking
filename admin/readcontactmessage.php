<?php
session_start();

include('db_admin.php');

	
	$query ="UPDATE contact SET status='1'";
	 $result = $connection->query($query);

	 if ($result) 
	    {
	       $_SESSION['success'] = "";
	        header('location: request');
	    }
	    else
	    {
	        echo "<div class='alert alert-danger'>Somethings wrong:".$connection->error."</div>";
	    }    
	   


?>