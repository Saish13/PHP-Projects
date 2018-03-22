<?php
	
	include "config.php";

	session_start();
	
	$preusr=$_SESSION['retailer'];
	
	$orderno=$_POST["ono"];
	$status=$_POST["status"];
	
	if($orderno > "" && $status > "")
	{
		$query="select * from orders,product,retailer where orders.p_id=product.p_id and product.r_id=retailer.r_id and product.r_id='$preusr' and o_no='$orderno' and delivery_status='$status' group by o_no;";
		//$query="select * from orders where o_no='$orderno' and delivery_status='$status' group by o_no;";
	}
	elseif($orderno > "" && $status == "")
	{
		$query="select * from orders,product,retailer where orders.p_id=product.p_id and product.r_id=retailer.r_id and product.r_id='$preusr' and o_no='$orderno' group by o_no;";
		//$query="select * from orders where o_no='$orderno' group by o_no;";
	}
	elseif($orderno== "" && $status > "")
	{
		$query="select * from orders,product,retailer where orders.p_id=product.p_id and product.r_id=retailer.r_id and product.r_id='$preusr' and delivery_status='$status' group by o_no;";
		//$query="select * from orders where delivery_status='$status' group by o_no;";
	}
	else
	{
		$query="select * from orders,product,retailer where orders.p_id=product.p_id and product.r_id=retailer.r_id and product.r_id='$preusr' group by o_no order by eddate;";
		//$query="select * from orders group by o_no order by eddate;";
	}
	$runq=mysql_query($query);
	$listcolor=1;
	while($rdata=mysql_fetch_array($runq))
	{	
		if($listcolor == 3)
		{
			$listcolor=1;
		}
		
		if ($listcolor==1)
		{
			$color="silver";
		}
		if ($listcolor==2)
		{
			$color="grey";
		}
		echo "<div id=".$rdata['o_no']." class=\"datalist\" style=\"background-color:$color\">";
		echo "Order No.".$rdata["o_no"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Delivery Status : ".$rdata["delivery_status"]."";
		echo "</div>";
		$listcolor++;
	}
?>
<html>
<head>
<script language="javascript" type="text/javascript" src="jquery-1.10.2.min.js">
</script>
<script type="text/javascript">
$(document).ready(function()
{
	$(".datalist").click(function()
	{
		ono=$(this).attr("id");
		$.post("displayorder.php",{ order:ono },function(data)
		{
			win=window.open('about:blank');
			with(win.document)
			{
				open();
				write(data);
				close();
			}
		});
	});
});
</script>
<style>
.datalist
{
	height:80px;
}
img
{
	width:100px;
	height:100px;
}
</style>
</head>
<body>
<div id="pp"></div>
</body>
</html>