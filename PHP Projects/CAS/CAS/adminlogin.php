<?php

	
	include "cfg/config.php";

	if (isset($_POST['usrnm']) && isset($_POST['pass']))
	{
		$usrn=$_POST['usrnm'];
		$pass=$_POST['pass'];
		
		echo $query="select * from admin where username = '$usrn' and password = '$pass';";
		$chk=mysql_query($query);
		$val=mysql_num_rows($chk);
		if ($val==1)
		{
			$_SESSION['admin']=$usrn;
			header("location:adminpanel.php");
		}
		else
		{
			echo "<script language=\"javascript\" type=\"text/javascript\"> alert('WRONG USERNAME/PASSWORD'); </script>";
		}
	}
	else
	{
	
	}

?>

<html>
<head>
<title>
Admin Login
</title>
<link rel="stylesheet" type="text/css" href="css/main.css"/>
<style>
body
{
	background-image:url("images/background.jpg");
}
</style>
</head>
<body>
<b>ADMINISTRATOR LOGIN</b></br></br>
<form method="POST">
<table>
<tr><td>Username</td><td><input type="text" name="usrnm"/></td></tr>
<tr><td>Password</td><td><input type="password" name="pass"/></td></tr>
<tr><td></td><td><input type="submit" name="submit" value="login"/></td></tr>
</table>
</form>
</body>
</html>