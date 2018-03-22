<?php
	
	include "config.php";
	
	if (!isset($_SESSION['admin']))
	{
		header("location:adminlogin.php");
	}
	$preuser=$_SESSION['admin'];
	
	echo $preuser;

?>
<html>
<head>
<script language="javascript" type="text/javascript" src="jquery-1.10.2.min.js">
</script>
<script type="text/javascript">
</script>
</head>
<style>
div.menu
{
	position:absolute;
	left:200px;
	top:70px;
	height:60px;
	width:920px;
	background-color:grey;
	color:white;
	border-radius:5px;
}
a
{
	float:left;
	text-decoration:none;
	padding:20px;
	color:white;
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
}
h1
{
	position:absolute;
}
</style>
<body>
<form action="logout.php" method="POST">
<input type="submit" value="logout" name="logout"/>
</form>
<div class="menu">
<a id="1" name="1" href="addnewcarhire.php" target="disp" style="left:20px;">ADD CAR HIRE</a>
<a id="2" name="2" href="addnewholidaypackage.php" target="disp" style="left:170px;">ADD HOLIDAY PACKAGES</a>
<a id="4" name="3" href="addnewactivity.php" target="disp" style="left:400px;">ADD ACTIVITIES</a>
<a id="4" name="3" href="delete.php" target="disp" style="left:570px;">DELETE</a>
<a id="4" name="4" href="viewpurchase.php" target="disp" style="left:700px;">VIEW PURCHASES</a>
</div>
<div class="display">
<iframe name="disp" ></iframe>
<div>
</body>
</html>