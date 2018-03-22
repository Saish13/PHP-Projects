<?php
	
	session_start();
	include "config.php";
	$retailer=$_SESSION["retailer"];
	$status=$_POST["delstat"];
	$ono=$_SESSION["order_no"];
	$query="update orders,product,retailer set orders.delivery_status='Dispatched' where o_no='$ono' and orders.p_id=product.p_id and product.r_id=retailer.r_id and retailer.r_id='$retailer';";
	$run=mysql_query($query);
	
	if($status=="Dispatched")
	{
		$query="select p_id,qty_ordered from orders where o_no='$ono';";
		$run1=mysql_query($query);
		while($rdata=mysql_fetch_array($run1))
		{
			$pid=$rdata["p_id"];
			$qty=$rdata["qty_ordered"];
			$query="select * from product where p_id='$pid'";
			$run=mysql_query($query);
			$rowdata=mysql_fetch_array($run);
			$preqty=$rowdata["p_qty"];
			$retailer=$rowdata["r_id"];
			$nqty=$preqty-$qty;
			if ($nqty<0)
			{
				$nqty=0;
			}
			$query="update product set p_qty='$nqty' where p_id='$pid' and r_id='$retailer'";
			$run=mysql_query($query);
		}
	}
?>
<html>
<head>
</head>
<body>
</body>
</html>