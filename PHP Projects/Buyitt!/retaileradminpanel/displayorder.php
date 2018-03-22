<?php

	session_start();
	include "config.php";

	$orderno=$_POST["order"];
	$retailer=$_SESSION["retailer"];
	$_SESSION["order_no"]=$orderno;
	$query="select * from orders,product,customer where o_no='$orderno' and product.r_id='$retailer' and orders.p_id=product.p_id and orders.c_id=customer.c_id;";
	$run=mysql_query($query);
	$rdata=mysql_fetch_array($run);
	$grandtotal=0;
	$name=$rdata["c_name"];
	echo "<table width='40%' cellspacing='15px'>";
	echo "<tr><td>NAME</td><td>".ucfirst($name)."</td></tr>";
	echo "<tr><td>EMAIL</td><td>".$rdata["c_email"]."</td></tr>";
	echo "<tr><td>CONTACT NUMBER</td><td>".$rdata["c_contactno"]."</td></tr>";
	echo "<tr><td>ADDRESS</td><td>".$rdata["c_add"]."</td></tr>";
	echo "</table>";
	echo "</br></br></br></br>";
	$query="select * from orders,product where o_no='$orderno' and product.r_id='$retailer' and orders.p_id=product.p_id;";
	$run=mysql_query($query);
	echo "<table width='100%' class='datalist'>";
	echo "<tr><th></th><th>ORDER NO.</th><th>PRODUCT ID</th><th>PRODUCT NAME</th><th>QUANTITY ORDERED</th><th>TOTAL AMOUNT</th><th>DELIVERY STATUS</th></tr>";
	while($rdata=mysql_fetch_array($run))
	{
		$img=$rdata["p_img1"];
		echo "<tr><td><img src='$img'/></td><td>".$rdata["o_no"]."</td><td>".$rdata["p_id"]."</td><td>".$rdata["p_name"]."</td><td>".$rdata["qty_ordered"]."</td><td>Rs.".$rdata["total_amount"]."</td><td>".$rdata["delivery_status"]."</td></tr>";
		$grandtotal=$grandtotal+$rdata["total_amount"];
	}
	echo "</table>";
	echo "</br></br>";
	echo "<table class='gtot' width='40%'>";
	echo "<tr><td>TOTAL PAYABLE AMOUNT</td><td>Rs.".$grandtotal."</td></tr>";
	echo "</table>";
	echo "</br></br>";
	$query="select * from orders,product,customer where o_no='$orderno' and product.r_id='$retailer' and orders.p_id=product.p_id and orders.c_id=customer.c_id;";
	$run=mysql_query($query);
	$rdata=mysql_fetch_array($run);

	if($rdata["delivery_status"]=="Approval")
	{
		echo "<div id='options'>";
		echo "<table class='options' width='60%'>";
		echo "<tr><td>DELIVERY STATUS</td><td id='combo'><select id='deloption'><option></option><option>Dispatched</option><option>Delivered</option></select></td>";
		echo "<td id='bill'></td></tr>";
		echo "</table>";
		echo "</div>";
	}
	elseif($rdata["delivery_status"]=="Dispatched")
	{
		echo "<div id='options'>";
		echo "<table class='options' width='60%'>";
		echo "<tr><td>DELIVERY STATUS</td><td id='combo'><select id='deloption'><option></option><option>Delivered</option></select></td>";
		echo "<td id='bill'><a href='bill.php'>Generate Bill</a></td></tr>";
		echo "</table>";
		echo "</div>";
	}
	elseif($rdata["delivery_status"]=="Delivered")
	{
		echo "<div id='options'>";
		echo "<table class='options' width='60%'>";
		echo "<tr><td>DELIVERY STATUS</td><td>DELIVERED</td>";
		echo "<td id='bill'><a href='bill.php'>View Bill</a></td></tr>";
		echo "</table>";
		echo "</div>";
	}
	else
	{
		echo $rdata["delivery_status"];
	}
?>
<html>
<head>
<script language="javascript" type="text/javascript" src="jquery-1.10.2.min.js">
</script>
<script type="text/javascript">
$(document).ready(function()
{
	$("#deloption").blur(function()
	{
		val=$("#deloption").val();
		if(val>"")
		{
			$.post("load.php", { delstat:val }, function(data)
			{
				$("#ajaxloader").html(data);
				if(val=="Dispatched")
				{
					$("#combo").html("");
					$("#bill").html("<a href='bill.php'>Generate Bill</a>");
				}
				else if(val=="Delivered")
				{
					$("#combo").html("<select id='deloption'><option></option><option>Delivered</option></select>");
					$("#bill").html("<a href='bill.php'>View Bill</a>");
				}
			});
		}
	});
});
</script>
<style>
img
{
	width:100px;
	height:100px;
}
table.datalist
{
	text-align:center;
}
table.gtot
{
	position:absolute;
	left:500px;
}
#options
{
	position:absolute;
	left:200px;
	width:900px;
}
body
{
	min-height:800px;
}
#ajaxloader
{
	width:0px;
	height:0px;
}	
</style>
</head>
<body>
<div id="ajaxloader"></div>
</body>
</html>