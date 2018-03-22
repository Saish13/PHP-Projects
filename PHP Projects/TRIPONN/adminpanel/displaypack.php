<?php

	include "config.php";
	
	$pid=$_GET["pid"];
	$ptype=$_GET["ptype"];

	$query="select * from purchases where p_id = '$pid';";
	$run=mysql_query($query);
	$pdata=mysql_fetch_array($run);
	$cid=$pdata["c_id"];
	$packid=$pdata["package_id"];
	$totrate=$pdata["total_rate"];
	$dop=$pdata["dop"];
	$top=$pdata["top"];
	$name1=$pdata["name1"];
	$name2=$pdata["name2"];
	$name3=$pdata["name3"];
	$name4=$pdata["name4"];
	$name5=$pdata["name5"];
	$addnames=$pdata["additional_names"];
	
	$query="select * from customer where c_id = '$cid';";
	$run=mysql_query($query);
	$cdata=mysql_fetch_array($run);
	$cname=$cdata["c_name"];
	$add=$cdata["address"];
	$email=$cdata["email"];
	$contno=$cdata["cont_no"];
	
	$query="select * from $ptype where package_id = '$packid';";
	$run=mysql_query($query);
	$hpdata=mysql_fetch_array($run);
	$packname=$hpdata["package_name"];
	$startd=$hpdata["start_d"];
	$endd=$hpdata["end_d"];
	$packdetails=$hpdata["package_detail"];
	$country=$hpdata["country"];
	$area=$hpdata["area"];
	$state=$hpdata["state"];
	
	
	
	echo "<table id='ptable' cellspacing='5px' width='40%'>";
	echo "<tr><td>Purchase IN</td><td>$pid</td></tr>";
	echo "<tr><td>Package Name</td><td>$packname</td></tr>";
	echo "<tr><td>Date</td><td>$dop</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Time &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>$top</td></tr>";
	echo "</table>";
	
	echo "<table id='ctable' cellspacing='5px' width='40%'>";
	echo "<tr><td>Customer/Agent Name</td><td>$cname</td></tr>";
	echo "<tr><td>Address</td><td>$add</td></tr>";
	echo "<tr><td>Email</td><td>$email</td></tr>";
	echo "<tr><td>Contact Number</td><td>$contno</td></tr>";
	echo "</table>";
	
	echo "<table id='m1table' cellspacing='5px' width='40%'>";
	echo "<tr><td>Package Name</td><td>$packname</td></tr>";
	echo "<tr><td>Start Date</td><td>$startd</td></tr>";
	echo "<tr><td>End Date</td><td>$endd</td></tr>";
	echo "<tr><td>Country</td><td>$country</td></tr>";
	echo "<tr><td>State</td><td>$state</td></tr>";
	echo "<tr><td>Area</td><td>$area</td></tr>";
	echo "</table>";
	
	echo "<table id='m2table' cellspacing='5px' width='50%'>";
	echo "<tr><th>Participants</th></tr>";
	echo "<tr><td>Name</td><td align='left'>$name1</td></tr>";
	echo "<tr><td>Name</td><td>$name2</td></tr>";
	echo "<tr><td>Name</td><td>$name3</td></tr>";
	echo "<tr><td>Name</td><td>$name4</td></tr>";
	echo "<tr><td>Name</td><td>$name5</td></tr>";
	echo "<tr><td>Additional Names</td><td>$addnames</td></tr>";
	echo "</table>";
	
	echo "<table id='pricetable' cellspacing='5px' width='30%'>";
	echo "<tr><td>Total Amount</td><td><b>Rs.$totrate</b></td></tr>";
	echo "<tr><td>Payment Details</td><td><b>PAID</b></td></tr>";
	echo "</table>";
	
	echo "<table id='signtable' cellspacing='5px' width='30%'>";
	echo "<tr><td>Customer Signature</td><td>Agents Signature</td></tr>";
	echo "</table>";

		echo "<b><center><table id='last'><tr><td ><p color='red'>*Please carry a printed copy of this recipt.</p></td></tr>";
		echo "<tr><td><a href='/TRIPONN/index.php'>Home</a></td></tr></table></center></b>";	
	
?>
<html>
<head>
<style>
#ctable
{
	position:absolute;
	right:30px;
	top:10px;
}
#ptable
{
	position:absolute;
	top:10px;
}
#m2table
{
	position:absolute;
	right:10px;
	top:180px;
}
#m1table
{
	position:absolute;
	top:180px;
}
#pricetable
{
	position:absolute;
	right:10px;
	top:480px;
}
#signtable
{
	position:absolute;
	right:450px;
	top:535px;
}
#last
{
	position:absolute;
	top:700px;
	left:300px;
}
</style>
</head>
</html>