<?php
	include "cfg/config.php";
	
	if (isset($_SESSION['admin']))
	{
		$qu=mysql_query("select * from teachers");
		echo "<table border='1px' cellpadding='20px'>";
		echo "<tr><th>TEACHER ID</th><th>TEACHER NAME</th><th>ADDRESS</th><th>EMAIL ID</th><th>CURRENT STATUS</th><th>APPROVAL STATUS</th></tr>";
		while($data=mysql_fetch_array($qu))
		{
			if ($data['app_status']==0)
			{
				$currstatus="De-Activated";
			}
			else
			{
				$currstatus="Activated";
			}
			$status=$data['app_status'];
			if ($status == 1)
			{
				echo "<tr><td>".$data['t_id']."</td><td>".$data['t_name']."</td><td>".$data['t_address']."</td><td>".$data['t_email']."</td><td>$currstatus</td><td><form name='option1' method='POST'><input type='hidden' name='dac' value='".$data['t_id']."'/><input type='submit' name='deactivate' id='deactive' value='De-Activate'/></form></td></tr>";
			}
			else
			{
				echo "<tr><td>".$data['t_id']."</td><td>".$data['t_name']."</td><td>".$data['t_address']."</td><td>".$data['t_email']."</td><td>$currstatus</td><td><form name='option2' method='POST'><input type='hidden' name='ac' value='".$data['t_id']."'/><input type='submit' name='activate' id='active' value='Activate'/></form></td></tr>";
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
		$qu=mysql_query("update teachers SET app_status=1 WHERE t_id='$tempc'");
		if($qu)
		{
			header('Location:'.$_SERVER['PHP_SELF']);
		}		
	}
	else if (!empty($_POST['deactivate']))
	{
		$tempv=$_POST['dac'];
		echo $tempv;
		$qu=mysql_query("update teachers SET app_status=0 WHERE t_id='$tempv'");
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
	left:70px;
}
form.logout
{
	position:absolute;
	right:5px;
}
</style>
<link rel="stylesheet" type="text/css" href="css/main.css"/>
<script language='javascript' type='text/javascript'>
	
</script>
<body>

</br></br></br>
</body>
</html>