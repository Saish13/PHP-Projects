<?php

	include "config.php";
	session_start();
	$grandtotal=0;

?>
<html>
<head>
<script language="javascript" src="scripts/jquery-1.10.2.min.js">
</script>
<script language="javascript" type="text/javascript">
$(document).ready(function()
{
	$("#placeorder").click(function()
	{
		val=$("input[name=address]:checked").val();
		if(val==1)
		{
			val=$("#newadd").val()
		}
		add=val;
		$.post("order.php", { address:add }, function(data){$("#displaybox").html(data);})
	});
});
</script>
<link rel="stylesheet" type="text/css" href="css/main.css"/>
</head>
<style>
a.curruser
{
	text-decoration:none;
}
img
{
	height:150px;
	width:150px;
}
.cont
{
	background-color:grey;
	position:relative;
}
#cart
{
	position:absolute;
	right:30px;
	width:200px;
	height:80px;
	background-color:grey;
	top:50px;
	border-radius:10px;
	color:white;
	text-indent:40px;
}
img.mainimg
{
	width:350px;
	height:300px;
}
img.simg
{
	width:80px;
	height:60px;
}
#imgbox
{
	position:absolute;
	left:150px;
	top:50px;
}
#namenprice
{
	position:absolute;
	width:400px;
	min-height:380px;
	top:50px;
	left:600px;
}
#details
{
	position:relative;
	width:600px;
	min-height:250px;
	top:500px;
	left:200px;
}
#feedback
{
	position:relative;
	background-color:grey;
	width:1050px;
	min-height:250px;
	top:550px;
	left:150px;
}
td,th
{	
}
.addcart
{
	width:150px;
	height:70px;
	background-color:grey;
	border-radius:10px;
	color:white;
}
div.cont
{
	background-color:grey;
}
#placeorder
{
	position:absolute;
	left:500px;
	background-color:green;
	color:white;
	width:200px;
	height:50px;
	border-radius:10px;
	cursor:default;
}
td
{
	text-align:center;
}
#ajaxloader
{
	width:0px;
	height:0px;
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
<li><a href="" class="curruser"><?php echo $_SESSION["user"]; ?></a></li>
</ul>
</div>
<div id="line1"></div>
</div>
<div id="searchbox">
<form action="search.php" method="GET">
<table id="psb" cellpadding="5px">
<tr><td style="color:white" >SEARCH</td><td><select id="ty" name="ptype">
<?php
	$query="select p_type from product group by p_type;";
	$runq=mysql_query($query);
	echo "<option></option>";
	while($rdata=mysql_fetch_array($runq))
	{
		echo "<option>".$rdata["p_type"]."</option>";
	}
?>
</select></td><td><input type="text" id="search" name="pname" size="70"/></td><td><input type="submit" value="SEARCH"/></td></tr>
</table>
</form>
</div>
<div id="displaybox">
<?php
	$query="select * from customer where c_id ='".$_SESSION["user"]."'";
	$run=mysql_query($query);
	$rdata=mysql_fetch_array($run);
	echo "<div id='customerinfo'>";
	echo "<h2>EMAIL ID AND CONTACT NUMBER</h2></br>";
	echo "<table width='50%' cellpadding='5px;'>";
	echo "<tr><td>EMAIL</td><td>".$rdata["c_email"]."</td></tr>";
	echo "<tr><td>Contact No</td><td>".$rdata["c_contactno"]."</td></tr>";
	echo "</table>";
	echo "</div></br>";
	echo "<div id='deliveryaddress'>";
	echo "<h2>DELIVERY ADDRESS</h2></br>";
	echo "<table width='50%' cellpadding='5px;'>";
	echo "</tr><td><input type='radio' name='address' id='priadd' value='".$rdata["c_add"]."' checked='checked'/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Use my primary address</td>";
	echo "<td><input type='radio' name='address' value='1'/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Use another address</td></tr>";
	echo "<tr><td>".$rdata["c_add"]."</td>";
	echo "<td><textarea id='newadd'></textarea></td></tr>";
	echo "</table>";
	echo "</div>";
	echo "<div id='items'>";
	echo "<h2>ORDERED ITEMS</h2></br>";	
	echo "<table width='100%' cellpadding='10px'>";
	echo "<tr><th></th><th>ITEM</th><th>QUANTITY</th><th>RATE</th><th>DELIVERY DATE</th><th>SUB TOTAL</th></tr>";
	if(isset($_SESSION["cart"]))
	{
		$num=0;
		$li=count($_SESSION["cart"]);
		if (is_array($_SESSION["cart"]))
		{
			for($i=0;$i<$li;$i++)
			{
				$query="select * from product where p_id ='".$_SESSION["cart"][$i]["productid"]."'";
				$run=mysql_query($query);
				$rdata=mysql_fetch_array($run);
				$img="retaileradminpanel/".$rdata["p_img1"];
				$prodname=$_SESSION["cart"][$i]["productname"];
				$prodqty=$_SESSION["cart"][$i]["quantity"];
				$prodrate=$_SESSION["cart"][$i]["rate"];
				$subtotal=$prodqty*$prodrate;
				echo "<tr><td><img src='$img'/></td><td>".$prodname."</td><td>".$prodqty."</td><td>Rs.".$prodrate."</td><td>".date("dS F Y",strtotime("+2 days"))."</td><td>Rs.".$subtotal."</td></tr>";
				$grandtotal=$grandtotal+$subtotal;
				$_SESSION["cart"][$i]["subtotal"]=$subtotal;
			}	
		}
	}
	echo "</table></br></br>";
	echo "<table style='position:absolute;right:70px;'>";
	echo "<tr><td><h3>TOTAL PAYABLE AMOUNT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs.".$grandtotal."</h3></td></tr>";
	echo "</table>";
	echo "<a class='curruser'><div id='placeorder' class=''><p style='position:absolute;top:-4px;left:60px;'>BUY NOW</p></div></a>";
	echo "</div>";
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
<div id="ajaxloader">
</div>
</body>
</html>