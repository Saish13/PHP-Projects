<?php

	session_start();
	
	if(isset($_SESSION["cart"]))
	{
		if (count($_SESSION["cart"])!=0)
		{
			echo "<h3>CART &nbsp;&nbsp;&nbsp;&nbsp;".count($_SESSION["cart"])."</h3>";
		}
		else
		{
			echo "<h3>CART &nbsp;&nbsp;&nbsp;&nbsp;0</h3>";		
		}
	}
	else
	{
		echo "<h3>CART &nbsp;&nbsp;&nbsp;&nbsp;0</h3>";
	}
?>
<html>
<head>
<style>
</style>
</head>
<body>
</body>
</html>