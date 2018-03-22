<?php

	session_start();
	
	include "config.php";

	if (isset($_POST['usrnm']) && isset($_POST['pass']))
	{
		$usrn=$_POST['usrnm'];
		$pass=$_POST['pass'];
		
		$query="select * from sadmin where username = '$usrn' and pwd = '$pass';";
		$chk=mysql_query($query);
		$val=mysql_num_rows($chk);
		if ($val==1)
		{
			$_SESSION['admin']=$usrn;
			header("location:admincp.php");
		}
		else
		{
			echo "<script language=\"javascript\" type=\"text/javascript\"> alert('INCORRECT CREDENTIALS'); </script>";
		}
	}
	else
	{
	
	}
	
?>

<html>
<head>
<title>
Admin Pannel Login
</title>
</head>
<body>


<form name="login" method="POST">
<table>
<tr><td>Username</td><td><input type="text" name="usrnm" /></td></tr>
<tr><td>Password</td><td><input type="password" name="pass" /></td></tr>
<tr><td></td><td><input type="submit" name="submit" value="login" /></td></tr>
</table>
</form>


</body>
</html>