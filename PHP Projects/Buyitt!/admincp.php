<?php

	include "config.php";
	session_start();
	
	if (isset($_SESSION['admin']))
	{
		echo "<h1 align='center'>".$_SESSION['admin']." Control Pannel</h1>";
		$qu=mysql_query("select * from retailer");
		echo "<table border='1px' cellpadding='20px'>";
		echo "<tr><td>Retailer ID</td><td>Company Name</td><td>Address</td><td>Type of business</td><td>Contact Number</td><td>Email ID</td><td>Current Status</td><td>Change Approval Status</td></tr>";
		while($data=mysql_fetch_array($qu))
		{
			if ($data['approval_status']==0)
			{
				$currstatus="De-Activated";
			}
			else
			{
				$currstatus="Activated";
			}
			$status=$data['approval_status'];
			if ($status == 1)
			{
				echo "<tr><td>".$data['r_id']."</td><td>".$data['r_compname']."</td><td>".$data['r_add']."</td><td>".$data['tob']."</td><td>".$data['contact_no']."</td><td>".$data['email_id']."</td><td>$currstatus</td><td><form name='option1' method='POST'><input type='hidden' name='dac' value='".$data['r_id']."'/><input type='submit' name='deactivate' id='deactive' value='De-Activate'/></form></td></tr>";
			}
			else
			{
				echo "<tr><td>".$data['r_id']."</td><td>".$data['r_compname']."</td><td>".$data['r_add']."</td><td>".$data['tob']."</td><td>".$data['contact_no']."</td><td>".$data['email_id']."</td><td>$currstatus</td><td><form name='option2' method='POST'><input type='hidden' name='ac' value='".$data['r_id']."'/><input type='submit' name='activate' id='active' value='Activate'/></form></td></tr>";
			}
		}
	}
	if (!empty($_POST['logout']))
	{
		unset($_SESSION['admin']);
		header('location:admincp.php');
	}
	if (!empty($_POST['activate']))
	{
		$tempc=$_POST['ac'];
		echo $tempc;
		$qu=mysql_query("update retailer SET approval_status=1 WHERE r_id='$tempc'");
		if($qu)
		{
			header('Location:'.$_SERVER['PHP_SELF']);
		}		
	}
	else if (!empty($_POST['deactivate']))
	{
		$tempv=$_POST['dac'];
		echo $tempv;
		$qu=mysql_query("update retailer SET approval_status=0 WHERE r_id='$tempv'");
		if($qu)
		{
			header('Location:'.$_SERVER['PHP_SELF']);
		}		
	}
	
?>
<html>
<head>

<title>
ADMIN CONTROL PANNEL
</title>
</head>
<style>
table
{
	position:absolute;
	text-align:center;
	left:50px;
}
form.logout
{
	position:absolute;
	right:5px;
}
</style>
<script language='javascript' type='text/javascript'>
	
</script>
<body>
<form method="POST" class="logout">
<input type="submit" name="logout" value="logout"/>
</form>
</br></br></br>
</body>
</html>