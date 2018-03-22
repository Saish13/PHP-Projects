<?php

	
	include "cfg/config.php";

	if (isset($_POST['usrnm']) && isset($_POST['pass']))
	{
		$usrn=$_POST['usrnm'];
		$pass=$_POST['pass'];
		
		$query="select * from teachers where t_id = '$usrn' and t_pass = '$pass';";
		$chk=mysql_query($query);
		$val=mysql_num_rows($chk);
		if ($val==1)
		{
			$query="select * from teachers where t_id = '$usrn';";
			$run=mysql_query($query);
			$data=mysql_fetch_array($run);
			$status=$data["app_status"];
			$tname=$data["t_name"];
			if($status==1)
			{
				header("location:teacherspanel/teacherpanel.php");
				$_SESSION["teacher"]=$tname;
			}
		}
		else
		{
			echo "<script language=\"javascript\" type=\"text/javascript\"> alert('WRONG USERNAME/PASSWORD'); </script>";
		}
	}
	else
	{
		echo "<script language='javascript' type='text/javascript'>setInterval(function(){window.location.href='index.php'},2000);</script>";
	}
	
?>

<html>
<head>
<title>
Admin Login
</title>
<style>
body
{
	background-image:url("images/background.jpg");
}
</style>
<link rel="stylesheet" type="text/css" href="css/main.css"/>
</head>
<body>
<b>TEACHER LOGIN</b></br></br>
<form name="login" method="POST">
<table>
<tr><td>Teacher ID</td><td><input type="text" name="usrnm" /></td></tr>
<tr><td>Password</td><td><input type="password" name="pass" /></td></tr>
<tr><td></td><td><input type="submit" name="submit" value="login" /></td></tr>
</table>
</form>
</body>
</html>