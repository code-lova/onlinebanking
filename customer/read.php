<?php
session_start();

include('database_connect.php');

	
	$query ="UPDATE message SET status='1' WHERE user_id='".$_SESSION['id']."'";
	 $result = $connection->query($query);

	 if ($result) 
	    {
	       $_SESSION['success'] = "";
	        header('location: settings-message');
	    }
	    else
	    {
	        echo "<div class='alert alert-danger'>Somethings wrong:".$connection->error."</div>";
	    }    
	   


?>