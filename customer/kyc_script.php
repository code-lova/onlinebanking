<?php

session_start();
require_once('database_connect.php');

if (isset($_POST['kyc_btn'])) 
{

	 $identity = $_FILES["identity"]['name'];
	 
	 $identity = $connection->real_escape_string($_FILES['identity']['name']);

	  $validate_img_extension  = $_FILES["identity"]['type']=="image/jpg" ||
								 $_FILES["identity"]['type']=="image/png" ||
								 $_FILES["identity"]['type']=="image/jpeg";

		if ($validate_img_extension)
		{
			 if (file_exists("../kyc/" . $_FILES["identity"]["name"])) 
			     {
			    	$store = $_FILES["identity"]["name"];
			    	$_SESSION['status'] = "KYC Document was already uploaded. ";
			        header('location: verifyid-step-2');
				 }
				 else
				 {
				$query  = "INSERT INTO kycdoc (identity_doc,user_id,status) VALUES ('$identity','$_SESSION[id]','0')";
				    $result = $connection->query($query);

				    if ($result) 
				    {
				        //echo "yes";
				        move_uploaded_file($_FILES["identity"]["tmp_name"], "../kyc/".$_FILES["identity"]["name"]);

		        		$_SESSION['success'] = "SUCCESS";
		        		header('location: verifyid-step-3');

				    }
				    else
				    {
				        $_SESSION['status'] = "There was a Problem Sorry";
				        header('location: verifyid-step-2');
				    }    

				 }
		}
		else
		{
			$_SESSION['status'] = "Only PNG, JPG, and JPEG ";
		    header('location: verifyid-step-2');
		}

}









?>