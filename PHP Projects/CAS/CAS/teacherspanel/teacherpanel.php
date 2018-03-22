<?php


	include "cfg/config.php";
	
	if (!isset($_SESSION['teacher']))
	{
		//header("location:adminlogin.php");
	}
	$preuser=$_SESSION['teacher'];
	
	echo $preuser;
	echo "<h1 align='center'>TEACHER CONTROL PANEL</h1>";

?>
<html>
<head>
<script type="text/javascript">
</script>
</head>
<link rel="stylesheet" type="text/css" href="css/main.css"/>

<style>
body
{
	background-image:url("images/background.jpg");
}
div.menu
{
	position:absolute;
	left:200px;
	top:100px;
	height:60px;
	width:1000px;
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
	top:180px;
	width:100%;
	left:0px;
}
</style>
<body>

<form action="logout.php" method="POST">
<input type="submit" value="logout" name="logout"/>
</form>
<div class="menu">
<a id="1" name="1" href="viewattnd.php" target="disp" style="left:50px;">View Attendance</a>
<a id="1" name="1" href="viewoverallattd.php" target="disp" style="left:250px;">View Overall Attendance</a>
<a id="1" name="1" href="ondutyform.php" target="disp" style="left:500px;">Record Onduty Attendance</a>
<a id="1" name="1" href="editprofile.php" target="disp" style="left:750px;">Edit Profile</a>
</div>
<div class="display">
<iframe name="disp" ></iframe>
<div>
</body>
</html>
