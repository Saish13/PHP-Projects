<?php 

	include "config.php";
	session_start();
	
	$preuser=$_SESSION["user"];
	if($preuser=="Guest User")
	{
		header('location:index.php');
	}
	else
	{
	
	}
?>
<html>
<head>
<script language="javascript" src="scripts/jquery-1.10.2.min.js">
</script>
<script language="javascript" type="text/javascript">
</script>
<link rel="stylesheet" type="text/css" href="css/main.css"/>
<style>
img.pimage
{
	height:170px;
	width:200px;
}
</style>
</head>
<body>
<?php
	
	$query="select o_no from orders where c_id='$preuser' group by o_no";
	$run=mysql_query($query);
	$rows=mysql_num_rows($run);
	$i=1;
	while($rdata=mysql_fetch_array($run))
	{
		$ono=$rdata["o_no"];
		${'ono'.$i}="ono$i";
		${'ono'.$i}=$ono;
		$i++;
	}
	for	($i=1;$i<=$rows;$i++)
	{
		echo "<fieldset>";
		$co=${'ono'.$i};
		echo $co;
		$oquery="select * from orders where o_no = '$co' and c_id = '$preuser'";
		$orun=mysql_query($oquery);
		$orderrows=mysql_num_rows($orun);
		for ($j=1;$j<=$orderrows;$j++)
		{
			while($odata=mysql_fetch_array($orun))
			{
				$odate=$odata["o_date"];
				$totamt=$odata["total_amount"];
				$qty=$odata["qty_ordered"];
				$delstat=$odata["delivery_status"];
				$eddate=$odata["eddate"];
				$pid=$odata["p_id"];
				$query="select * from product where p_id = '$pid'";
				$run=mysql_query($query);
				$proddata=mysql_fetch_array($run);
				$pname=$proddata["p_name"];
				$pimg="retaileradminpanel/".$proddata["p_img1"];
				if($delstat=="Delivered")
				{
					echo "<div id=''>";
					echo "<table width='100%'>";
					echo "<tr><td rowspan='4'><img class='pimage' src='$pimg'/></td><td colspan='3'>$pname</td><td></tr><tr><td>Quantity Ordered : $qty</td><td>Total Amount : Rs. $totamt</td><td>Order Date : $odate</td></tr><tr><td> Delivery Status : $delstat</td><td></td><td> Delivered on : $eddate</td></tr>";
					echo "</table>";
					echo "</div>";
					echo "</br>";
				}
				else
				{
					echo "<div id=''>";
					echo "<table width='100%'>";
					echo "<tr><td rowspan='4'><img class='pimage' src='$pimg'/></td><td colspan='3'>$pname</td><td></tr><tr><td>Quantity Ordered : $qty</td><td>Total Amount : Rs. $totamt</td><td>Order Date : $odate</td></tr><tr><td> Delivery Status : $delstat</td><td></td><td> Expected Date of Delivery : $eddate</td></tr>";
					echo "</table>";
					echo "</div>";
					echo "</br>";
				}
				
			}
		}
		echo "</fieldset>";
		echo "</br>";
	}
	
?>
</body>
</html>