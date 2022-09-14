<?php

session_start();

include('db_admin.php');



if (isset($_POST['pin-btn'])) 
{
	
		$transfer_pin = $_POST['transfer_pin'];

		$transfer_pin   = $connection->real_escape_string($_POST['transfer_pin']);

		$query = "INSERT INTO account_pin (transfer_pin) VALUES('$transfer_pin')";

		$result = $connection->query($query);

		if ($result)
		{
			
			$_SESSION['status'] = "Account PIN Added Successfully..";
			$_SESSION['status_tle'] = "Perfect..";
		    $_SESSION['status_code'] = "success";
			header('location: account_pin');
			

		}
		else
		{
			$_SESSION['status'] = "Oops There's a Problem...";
			$_SESSION['status_tle'] = "Sorry...about that";
		    $_SESSION['status_code'] = "error";
			header('location: account_pin');
			

		}

}




	if (isset($_POST['delete_btn']))
		{
			$id = $_POST['delete_id'];

			$query = "DELETE FROM account_pin WHERE id='$id' ";
			$result = $connection->query($query);

			if ($result) 
		    {
		        //echo "yes";
		        $_SESSION['status'] = "Account PIN Deleted";
		        $_SESSION['status_tle'] = "Perfect";
				$_SESSION['status_code'] = "success";
		        header('location: account_pin');
		    }
		    else
		    {
		        $_SESSION['status'] = "Account PIN IS NOT DELETED";
		        $_SESSION['status_tle'] = "Sorry...about that";
				$_SESSION['status_code'] = "danger";
		        header('location: account_pin');
		    } 
		}






if (isset($_POST['imf_btn'])) 
{
	
		$imf = $_POST['imf'];

		$imf   = $connection->real_escape_string($_POST['imf']);

		$query = "INSERT INTO payment1 (imf) VALUES('$imf')";

		$result = $connection->query($query);

		if ($result)
		{
			
			$_SESSION['status'] = "Customer IMF Code Added Successfully..";
			$_SESSION['status_tle'] = "Perfect..";
			$_SESSION['status_code'] = "success";
			header('location: account_imf');
			

		}
		else
		{
			$_SESSION['status'] = "Oops There's a Problem...";
			$_SESSION['status_tle'] = "Sorry...about that";
			$_SESSION['status_code'] = "danger";
			header('location: account_imf');
			

		}

}


if (isset($_POST['delete_imf']))
		{
			$id = $_POST['delete_id'];

			$query = "DELETE FROM payment1 WHERE id='$id' ";
			$result = $connection->query($query);

			if ($result) 
		    {
		        //echo "yes";
		        $_SESSION['status'] = "IMF CODE DELETED SUCCESSFULLY.";
		        $_SESSION['status_tle'] = "Perfect";
				$_SESSION['status_code'] = "success";
		        header('location: account_imf');
		        
		    }
		    else
		    {
		        $_SESSION['status'] = "IMF CODE IS NOT DELETED";
		        $_SESSION['status_tle'] = "Sorry...about that";
				$_SESSION['status_code'] = "error";
		        header('location: account_imf');
		        
		    } 
		}





if (isset($_POST['ipn_btn'])) 
{
	
		$ipn = $_POST['ipn'];

		$ipn   = $connection->real_escape_string($_POST['ipn']);

		$query = "INSERT INTO payment2 (ipn) VALUES('$ipn')";

		$result = $connection->query($query);

		if ($result)
		{
			
			$_SESSION['status'] = "Customer IPN Code Added Successfully..";
			$_SESSION['status_tle'] = "Perfect";
			$_SESSION['status_code'] = "success";
			header('location: account_ipn');
			

		}
		else
		{
			$_SESSION['status'] = "Oops There's a Problem...";
			$_SESSION['status_tle'] = "Sorry...about that";
			$_SESSION['status_code'] = "error";
			header('location: account_ipn');
			

		}

}



if (isset($_POST['delete_ipn']))
		{
			$id = $_POST['delete_id'];

			$query = "DELETE FROM payment2 WHERE id='$id' ";
			$result = $connection->query($query);

			if ($result) 
		    {
		        //echo "yes";
		        $_SESSION['status'] = "IPN CODE DELETED SUCCESSFULLY.";
		        $_SESSION['status_tle'] = "Perfect";
				$_SESSION['status_code'] = "success";
		        header('location: account_ipn');
		        
		    }
		    else
		    {
		        $_SESSION['status'] = "IPN CODE IS NOT DELETED";
		        $_SESSION['status_tle'] = "Sorry...about that";
				$_SESSION['status_code'] = "danger";
		        header('location: account_ipn');
		        
		    } 
		}




if (isset($_POST['cot_btn'])) 
{
	
		$cot = $_POST['cot'];

		$cot   = $connection->real_escape_string($_POST['cot']);

		$query = "INSERT INTO payment3 (cot) VALUES('$cot')";

		$result = $connection->query($query);

		if ($result)
		{
			
			$_SESSION['status'] = "Customer COT Code Added Successfully..";
			$_SESSION['status_tle'] = "Perfect";
			$_SESSION['status_code'] = "success";
			header('location: account_cot');
			

		}
		else
		{
			$_SESSION['status'] = "Oops There's a Problem...";
			$_SESSION['status_tle'] = "Sorry...about that";
			$_SESSION['status_code'] = "danger";
			header('location: account_cot');
			

		}

}



if (isset($_POST['delete_cot']))
		{
			$id = $_POST['delete_id'];

			$query = "DELETE FROM payment3 WHERE id='$id' ";
			$result = $connection->query($query);

			if ($result) 
		    {
		        //echo "yes";
		        $_SESSION['status'] = "COT CODE DELETED SUCCESSFULLY";
		        $_SESSION['status_tle'] = "Perfect";
			    $_SESSION['status_code'] = "success";
		        header('location: account_cot');
		        
		    }
		    else
		    {
		        $_SESSION['status'] = "COT CODE IS NOT DELETED";
		        $_SESSION['status_tle'] = "Sorry...about that";
				$_SESSION['status_code'] = "danger";
		        header('location: account_cot');
		        
		    } 
		}




?>