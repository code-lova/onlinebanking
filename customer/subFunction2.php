<?php 




function setBalance($amount,$process,$savings_balance)
{	
	include('database_connect.php');
	$array = $connection->query("select * from users where id= '$_SESSION[id]' ");
	$row = $array->fetch_assoc();
	if ($process == 'credit') 
	{
		$savings_balance = $row['savings_balance'] + $amount;
		return $connection->query("update users set savings_balance = '$savings_balance' where savings_balance = '$row[savings_balance]'");
	}else
	{
		$savings_balance = $row['savings_balance'] - $amount;
		return $connection->query("update users set savings_balance = '$savings_balance' where savings_balance = '$row[savings_balance]'");
	}
}

?>