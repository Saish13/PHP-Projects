<?php

	session_start();
	include "config.php";

	$billno=$_POST["billno"];
	$orderno=$_SESSION["order_no"];
	$date=date("Y-m-d");
	$time=date("h:i:s A");
	$retailer=$_SESSION["retailer"];
	
	$query="insert into bill values('$billno','$date','$time','$orderno','$retailer')";
	$run=mysql_query($query);

?>
<html>
<head>
</head>
<body>
</body>
</html>