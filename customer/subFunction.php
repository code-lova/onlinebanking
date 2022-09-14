<?php 




function setBalance($amount,$process,$checking_balance)
{	
	include('database_connect.php');
	$array = $connection->query("select * from users where id= '$_SESSION[id]' ");
	$row = $array->fetch_assoc();
	if ($process == 'credit') 
	{
		$balance = $row['wallet'] + $amount;
		return $connection->query("update users set wallet = '$balance' where checking_balance = '$row[checking_balance]'");
	}else
	{
		$checking_balance = $row['checking_balance'] - $amount;
		return $connection->query("update users set checking_balance = '$checking_balance' where checking_balance = '$row[checking_balance]'");
	}
}


function setWalletBalance($amount,$process,$wallet)
{
	include('db_admin.php');
	$array = $connection->query("select * from customers where id= '$_SESSION[id]' ");
	$row = $array->fetch_assoc();
	if ($process == 'credit') 
	{
		$wallet = $amount;
		return $connection->query("update customers set wallet = '$wallet' where wallet = '$row[wallet]'");
	}else
	{
		$wallet = $row['wallet'] - $amount;
		return $connection->query("update customers set wallet = '$wallet' where wallet = '$row[wallet]'");
	}
}


?>