<?php

	session_start();
	
	include "config.php";
	
	if (!isset($_SESSION['retailer']))
	{
		header("location:rapadminlogin.php");
	}
	$preuser=$_SESSION['retailer'];
	
	echo "<h4 id='right'>WELCOME ".$preuser."</h4>";

?>
<html>
<head>
<script language="javascript" type="text/javascript" src="jquery-1.10.2.min.js">
</script>
<script type="text/javascript">
</script>
</head>
<style>
body
{
	background-color:grey;
}
div.menu
{
	position:absolute;
	left:270px;
	top:70px;
	height:60px;
	width:850px;
	background-color:#FFFAFA;
	color:black;
	border-radius:5px;
	opacity:.8;
}
a
{
	float:left;
	text-decoration:none;
	padding:20px;
	color:black;
	position:absolute;
	top-indent:20px;
}
iframe
{
	width:1100px;
	height:100%;
	position:absolute;
	top:150px;
	width:100%;
	left:0px;
	background-color:grey;
	outline:0px;
}
#right
{
	position:absolute;
	right:10px;
	color:white;
}
#lout
{
	position:absolute;
	right:10px;
	top:55px;
}
#heading
{
	color:white;
}
</style>
<body>
<form id="lout" action="logout.php" method="POST">
<input type="submit" value="logout" name="logout"/>
</form>
<div id="heading"><h1 align="center">RETAILER ADMIN PANEL</h1></div>
<div class="menu">
<a id="1" name="1" href="addnewprod.php" target="disp" style="left:20px;">Add Products</a>
<a id="2" name="2" href="editproducts.php" target="disp" style="left:170px;">Edit Products</a>
<a id="4" name="3" href="deleteproducts.php" target="disp" style="left:320px;">Delete Products</a>
<a id="4" name="4" href="manageorders.php" target="disp" style="left:470px;">Manage Orders</a>
<a id="5" name="5" href="manageinventory.php" target="disp" style="left:620px;">Manage Inventory Status</a>
</div>

<div class="display">
<iframe name="disp" ></iframe>
<div>
</body>
</html>
