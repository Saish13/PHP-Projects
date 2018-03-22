<?php

	include "config.php";
	session_start();
	if(!isset($_SESSION["user"]))
	{
		$_SESSION["user"]="Guest User";
	}
	else
	{
		$user=$_SESSION["user"];
	}
	$name=$_GET["pname"];
	$type=$_GET["ptype"];
	$_SESSION["last_url"]=$_SERVER["REQUEST_URI"];
	$rowchecker=1;
?>
<html>
<head>
<script language="javascript" src="scripts/jquery-1.10.2.min.js">
</script>
<script language="javascript" type="text/javascript">
/*$(document).ready(function()
{
	$(".cont").click(function()
	{
		id=$(this).attr("id");
		$.post("display.php", { pid:id }, function(data)
		{
			$("html").html(data);
			window.location.href="display.php";
		});
	});
});*/
</script>
<link rel="stylesheet" type="text/css" href="css/main.css"/>
</head>
<style>

img
{
	height:200px;
	width:200px;
}
.cont
{
	text-align:center;
}
table.data td
{
	width:200px;
	height:270px;
}
table.data td:hover
{
	border:1px solid black;
	transition:1s;
}
.data
{
	position:absolute;
	left:300px;
}
</style>
<body>
<div id="pageheader">
<h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php">BUYITT!</a></h1>
<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The online shopping website</h4>
<div id="topoptions">
<ul>
<li><a href="registeruser.php" class="lognreg">Login</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</li>
<li><a href="registeruser.php" class="lognreg">Register</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</li>
<li><a href="customerpannel.php" class="curruser" id="<?php echo $_SESSION["user"]; ?>"><?php echo $_SESSION["user"]; ?></a></li>
</ul>
</div>
<a class="cart" href="cart.php"><div id="cart">
<h3>CART &nbsp;&nbsp;&nbsp;&nbsp;
<?php if(isset($_SESSION["cart"])){echo count($_SESSION["cart"]);}else{echo "0";}; ?></h3>
</div></a>
<div id="line1"></div>
</div>
<div id="searchbox">
<form action="search.php" method="GET">
<table id="psb" cellpadding="5px">
<tr><td style="color:white" >SEARCH</td><td><select id="ty" value="<?php echo $type; ?>" name="ptype">
<?php
	$query="select p_type from product group by p_type;";
	$runq=mysql_query($query);
	echo "<option></option>";
	while($rdata=mysql_fetch_array($runq))
	{
		echo "<option>".$rdata["p_type"]."</option>";
	}
?>
</select></td><td><input type="text" id="search" name="pname" value="<?php echo $name ?>" size="70"/></td><td><input type="submit" value="SEARCH"/></td></tr>
</table>
</form>
</div>
<div id="displaybox">
<?php


	if($name > "" && $type > "")
	{
		$qury="select * from product,retailer where p_type like '%$type%' and p_name like '%$name%' and product.r_id=retailer.r_id and retailer.approval_status=1;";
	}
	else if($name > "" && $type == "")
	{
		$qury="select * from product,retailer where p_name like '%$name%' and product.r_id=retailer.r_id and retailer.approval_status=1;";
	}
	else if($name == "" && $type > "")
	{
		$qury="select * from product,retailer where p_type like '%$type%' and product.r_id=retailer.r_id and retailer.approval_status=1;";
	}
	else
	{
		$qury="select * from product,retailer where product.r_id=retailer.r_id and retailer.approval_status=1;";
	}
	
	
	$run=mysql_query($qury);
	echo "<table class='data' cellspacing='10px'>";
	while($rdata=mysql_fetch_array($run))
	{
		if($rowchecker==1)
		{
			echo "<tr>";
		}
		$image=$rdata['p_img1'];
		echo "<td>";
		echo "<div class='cont' id='".$rdata['p_id']."' onclick='document.forms[\"form".$rdata['p_id']."\"].submit();'>";
		echo "<form name='form".$rdata['p_id']."' action='disp.php' method='GET'>";
		echo "<input type='hidden' name='prod' value='".$rdata['p_id']."'/>";
		if($rdata['p_discount']==0)
		{
			echo "<img src='retaileradminpanel/$image'/></br>".$rdata['p_name']."</br>".$rdata['p_rate']."  Rs.</br>";
		}
		else
		{
			echo "<img src='retaileradminpanel/$image'/></br>".$rdata['p_name']."</br>".$rdata['p_rate']."  Rs.</br>".$rdata['p_discount']."% Discount";	
		}
		echo "</form>";
		echo "</div>";
		echo "</td>";			
		if($rowchecker==4)
		{
			echo "</tr>";
			$rowchecker=0;
		}
		$rowchecker++;
	}
	echo "</table>";
	$name="";
	$type="";
?>
</div>
<div id="sidebox">
</div>
<div id="pagefooter">
<div id="line2"></div>
<ol class="one">
<li>HELP</li>
</br></br>
<li><a class="footer" href="">FAQ's</a></li></br>
<li><a class="footer" href="">Terms & Conditions</a></li></br>
<li><a class="footer" href="">Cancellations</a></li></br>
</ol>
<ol class="two">
<li>BUYITT!!!</li>
</br></br>
<li><a class="footer" href="">About Us</a></li></br>
<li><a class="footer" href="">Sell on Buyitt</a></li></br>
<li><a class="footer" href="">Contact us</a></li></br>
</ol>
<ul class="three">
<li><a class="footer" href="registerretailer.php">Register your business on Buyitt<a></li>
<?php if($_SESSION["user"]!="Guest User"){
echo "<li>&nbsp;&nbsp;&nbsp;&nbsp;<b>|</b>&nbsp;&nbsp;&nbsp;&nbsp;<a class='footer' href='logout.php'>LOGOUT<a></li>"; }else{} ?>
</ul>
</div>
</body>
</html>