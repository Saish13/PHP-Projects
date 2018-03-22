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
	$_SESSION["last_url"]=$_SERVER["REQUEST_URI"];

?>
<html>
<head>
<script language="javascript" src="scripts/jquery-1.10.2.min.js">
</script>
<script language="javascript" type="text/javascript">
$(document).ready(function()
{
	$("#displaybox").load("homedeals.php");
	$(".curruser").click(function()
	{
	
	});
});

</script>
<link rel="stylesheet" type="text/css" href="css/main.css"/>
</head>

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
<tr><td style="color:white" >SEARCH</td><td><select id="select" name="ptype">
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
</div>
<div id="sidebox">
</div>
<div id="pagefooter">
<div id="line2"></div>
<ol class="one">
<li>HELP</li>
</br></br>
<li><a class="footer" href="faqs.php">FAQ's</a></li></br>
<li><a class="footer" href="termsnconds.php">Terms & Conditions</a></li></br>
<li><a class="footer" href="">Cancellations</a></li></br>
</ol>
<ol class="two">
<li>BUYITT!!!</li>
</br></br>
<li><a class="footer" href="">About Us</a></li></br>
<li><a class="footer" href="sellonbuyitt.php">Sell on Buyitt</a></li></br>
<li><a class="footer" href="contactus.php">Contact us</a></li></br>
</ol>
<ul class="three">
<li><a class="footer" href="registerretailer.php">Register your business on Buyitt<a></li>
<?php if($_SESSION["user"]!="Guest User"){
echo "<li>&nbsp;&nbsp;&nbsp;&nbsp;<b>|</b>&nbsp;&nbsp;&nbsp;&nbsp;<a class='footer' href='logout.php'>LOGOUT<a></li>"; }else{} ?>
</ul>
</div>
</body>
</html>