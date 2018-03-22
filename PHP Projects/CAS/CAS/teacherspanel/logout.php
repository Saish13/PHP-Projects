<?php 

	session_start();
	if(isset($_SESSION["teacher"]))
	{
		unset($_SESSION["teacher"]);
		header('location:../index.php');
	}
	
?>