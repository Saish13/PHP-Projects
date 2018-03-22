<?php

	session_start();
	
	include "config.php";

	if (isset($_POST['usrnm']) && isset($_POST['pass']))
	{
		$usrn=$_POST['usrnm'];
		$pass=$_POST['pass'];
		
		$query="select * from retailer where r_id = '$usrn' and r_pwd = '$pass';";
		$chk=mysql_query($query);
		$val=mysql_num_rows($chk);
		if ($val==1)
		{
			$query="select approval_status from retailer where r_id = '$usrn'";
			$chk=mysql_query($query);
			$data=mysql_fetch_array($chk);
			$apstat=$data['approval_status'];
			if($apstat==1)
			{
				$_SESSION['retailer']=$usrn;
				header("location:rap.php");
			}
			else
			{
				echo "<script language=\"javascript\" type=\"text/javascript\"> alert('YOUR ACCOUNT HAS BEEN DE_ACTIVATED'); </script>";
			}
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
Retailer Admin Panel Login
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