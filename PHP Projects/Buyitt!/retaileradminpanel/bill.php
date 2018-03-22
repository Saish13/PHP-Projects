<?php
	session_start();
	include "config.php";
	$orderno=$_SESSION["order_no"];
	$retailer=$_SESSION["retailer"];
	$query="select * from bill where o_no='$orderno' and r_id='$retailer';";
	$run=mysql_query($query);
	$rdata=mysql_fetch_array($run);
	$billno=$rdata["bill_no"];
	
?>
<html>
<head>
<script language="javascript" type="text/javascript" src="jquery-1.10.2.min.js">
</script>
<script type="text/javascript">
$(document).ready(function()
{
	$("#billno").blur(function()
	{
		temp=$("#billno").val();
		$("#data").html(temp);
	});
	$("#data").dblclick(function()
	{
		$("#data").html("<input type='text' id='billno' name='billno'/>");
		location.reload();
	});
	$("#print").click(function()
	{
		$("#print").hide();
		$("#save").hide(function()
		{
			window.print();
		});	
	});
	$("#save").click(function()
	{
		temp=$("#data").html();
		$.post("makebill.php", { billno:temp }, function(data){$("html").load(data)});
	});
});
</script>
<style>
table.bydetails
{
	position:absolute;
	top:30px;
	left:750px;
}
table.todetails
{
	position:absolute;
	top:30px;
	left:150px;
}
table.proddetails
{
	position:relative;
	top:300px;
	left:0px;
	text-align:center;
}
table.proddetails tr
{
	outline:thin solid;
}
tr.tdata
{
	height:50px;
}
#end
{
	position:absolute;
	bottom:0%;
	width:99%;
	text-align:center;
}
</style>
</head>
<body>
<?php
	$query="select * from orders,product,customer,retailer where o_no='$orderno' and product.r_id='$retailer' and orders.p_id=product.p_id and product.r_id=retailer.r_id and orders.c_id=customer.c_id;";
	$run=mysql_query($query);
	$rdata=mysql_fetch_array($run);
	$grandtotal=0;
	if($billno>"")
	{
		echo "<table class='bydetails' width='30%' cellspacing='5px'>";
		echo "<tr><td>Bill No.</td><td id='data'>$billno</td></tr>";
		echo "<tr><td>ORDER No.</td><td>".$rdata["o_no"]."</td></tr>";
		echo "<tr><td>ORDER Date</td><td>".$rdata["o_date"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rdata["o_time"]."</td></tr>";
		echo "<tr><td></td><td>".$rdata["r_compname"]."</td></tr>";
		echo "<tr><td></td><td>".$rdata["r_add"]."</td></tr>";
		echo "<tr><td></td><td>".$rdata["contact_no"]."</td></tr>";
		echo "<tr><td></td><td>".$rdata["email_id"]."</td></tr>";
		echo "</table>";
	}
	else
	{
		echo "<table class='bydetails' width='30%' cellspacing='5px'>";
		echo "<tr><td>Bill No.</td><td id='data'><input type='text' id='billno' name='billno'/></td></tr>";
		echo "<tr><td>ORDER No.</td><td>".$rdata["o_no"]."</td></tr>";
		echo "<tr><td>ORDER Date</td><td>".$rdata["o_date"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rdata["o_time"]."</td></tr>";
		echo "<tr><td></td><td>".$rdata["r_compname"]."</td></tr>";
		echo "<tr><td></td><td>".$rdata["r_add"]."</td></tr>";
		echo "<tr><td></td><td>".$rdata["contact_no"]."</td></tr>";
		echo "<tr><td></td><td>".$rdata["email_id"]."</td></tr>";
		echo "</table>";
	}
	echo "<table class='todetails' width='30%' cellspacing='5px'>";
	echo "<tr><td>BUYER INFORMATION</td><td>".ucfirst($rdata["c_name"])."</td></tr>";
	echo "<tr><td></td><td>".$rdata["c_email"]."</td></tr>";
	echo "<tr><td></td><td>".$rdata["c_contactno"]."</td></tr>";
	echo "<tr><td></td><td>".$rdata["c_add"]."</td></tr>";
	echo "</table>";
	
	$query="select * from orders,product where o_no='$orderno' and product.r_id='$retailer' and orders.p_id=product.p_id;";
	$run=mysql_query($query);
	echo "<table class='proddetails' width='100%' >";
	echo "<tr><th>ORDER NO.</th><th>PRODUCT ID</th><th>PRODUCT NAME</th><th>QUANTITY ORDERED</th><th>TOTAL AMOUNT</th></tr>";
	while($rdata=mysql_fetch_array($run))
	{
		echo "<tr class='tdata'><td>".$rdata["o_no"]."</td><td>".$rdata["p_id"]."</td><td>".$rdata["p_name"]."</td><td>".$rdata["qty_ordered"]."</td><td>Rs.".$rdata["total_amount"]."</td></tr>";
		$grandtotal=$grandtotal+$rdata["total_amount"];
	}
	echo "<tr><td></td><td></td><td></td><td>TOTAL PAYABLE AMOUNT</td><td>Rs.".$grandtotal."</td></tr>";
	echo "</table>";
	
	echo "<div id='end'>";
	echo "<hr>";
	echo "<h4 align='center'>This is a computer generated bill</h4>";
	echo "<div id='options'>";
	echo "<button id='save'>SAVE</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button id='print'>PRINT</button>";
	echo "</div>";
	echo "</div>";
?>
</body>
</html>