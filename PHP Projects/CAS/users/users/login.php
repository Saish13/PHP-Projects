<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
if(isset($_POST['login']))
{
	$username=mysql_real_escape_string($_POST['username']);
	$password=mysql_real_escape_string($_POST['password']);
	if($username && $password)
	{
		$connect=mysql_connect('localhost','root','');
		mysql_select_db("users");
		$login=mysql_query("SELECT * FROM users WHERE username='$username'");
		while($log=mysql_fetch_assoc($login))
		{
			$dbusername=$log['username'];
			$dbpassword=$log['password'];
		}
		if($username==$dbusername && $password==$dbpassword)
		{
			$_SESSION['username']=$dbusername;
			$_SESSION['password']=$dbpassword;
			header("location:home.php");
		}
		else
		{
			header("location:index.php?notify=Incorrect Username or Password.");
		}
	}
	else
	{
		header("location:index.php?notify=All fields are required.");
	}	
}
?>