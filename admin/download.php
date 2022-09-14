<?php
session_start();

if(!empty($_GET['attachment']))
{
	$fileName = basename($_GET['attachment']);
	$filePath = "../files/".$fileName;

	if(!empty($fileName) && file_exists($filePath))
		//define header
	{
		header("Cache-control: public");
		header("Content-Description: file Transfer");
		header("Content-Disposition: attachment; filename=$fileName");
		header("Content-Type: application/zip");
		header("Content-Transfer-Encoding: binary");

		//read file
		readfile($filePath);
		exit;
	}
	else
	{
		$_SESSION['status'] = "File does not exist in server";
	    header('location: tickets');
	}
}


?>