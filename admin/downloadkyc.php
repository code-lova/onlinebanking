<?php
session_start();

if(!empty($_GET['identity_doc']))
{
	$fileName = basename($_GET['identity_doc']);
	$filePath = "../kyc/".$fileName;

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
	    header('location: kyc');
	}
}


?>