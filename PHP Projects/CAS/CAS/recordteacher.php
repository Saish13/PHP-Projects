<?php 

	include "cfg/config.php";
	session_start();
	if (isset($_POST["tid"]) && isset($_POST["tname"]) && isset($_POST["eml"]) && isset($_POST["pwd"]) && isset($_POST["rpwd"]) && isset($_POST["add"]) && $_POST["pwd"]==$_POST["rpwd"])
	{
		$tid=$_POST["tid"];
		$tname=$_POST["tname"];
		$email=$_POST["eml"];
		$pass=$_POST["pwd"];
		$add=$_POST["add"];
		$appstat=0;
		$qury="Insert into teachers values ('$tid','$tname','$email','$add','$pass','$appstat')";
		$runq=mysql_query($qury);
		if($runq)
		{
			echo "<script language='javascript' type='text/javascript'>alert('Your account has been registered, Please wait for the administrator to approve your account')</script>";
		}
	}
	header("location:".$_SESSION['last_url']);
	
?>