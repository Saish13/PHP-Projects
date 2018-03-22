<?php

	session_start();
	include "config.php";

	$orderno=$_POST["order"];
	$retailer=$_SESSION["retailer"];

	$query="select * from orders,product where o_no='$orderno' and product.r_id='$retailer' and orders.p_id=product.p_id;";
	$run=mysql_query($query);
	while($rdata=mysql_fetch_array($run))
	{
		$img=$rdata["p_img1"];
		echo "<div>";
		echo "<img src='$img'/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rdata["p_id"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rdata["p_name"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rdata["qty_ordered"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rdata["total_amount"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rdata["delivery_status"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rdata["o_no"];
		echo "";
		echo "</div>";
	
	}
?>
<html>
<head>
<style>
img
{
	width:100px;
	height:100px;
}
</style>
</head>
<body>
</body>
</html>