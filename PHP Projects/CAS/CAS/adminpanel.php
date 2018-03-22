<?php

	
	include "/cfg/config.php";
	
	if (!isset($_SESSION['admin']))
	{
		header("location:adminlogin.php");
	}
	$preuser=$_SESSION['admin'];
	
	echo $preuser;
	echo "<h1 align='center'>ADMIN CONTROL PANNEL</h1>";

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
	opacity:.9;
}
</style>
<body>
<form action="logout.php" method="POST">
<input type="submit" value="logout" name="logout"/>
</form>


<div class="menu">
<a id="1" name="1" href="addstudents.php" target="disp" style="left:20px;">Add Students</a>
<a id="1" name="1" href="courses.php" target="disp" style="left:170px;">Add Course</a>
<a id="2" name="2" href="lectures.php" target="disp" style="left:320px;">Add Lectures</a>
<a id="4" name="3" href="timetable.php" target="disp" style="left:470px;">Add Timetable</a>
<a id="4" name="4" href="viewtimetable.php" target="disp" style="left:620px;">View/Delete Timetable</a>
<a id="5" name="5" href="acp.php" target="disp" style="left:820px;">Approve Teachers</a>
</div>

<div class="display">
<iframe name="disp" ></iframe>
<div>
</body>
</html>
