<?php 

	include "cfg/config.php";
	
?>
<html>
<head>
<style>
body
{
	background-image:url("images/background.jpg");
}
table.rolln
{
	text-align:center;
	position:absolute;
	top:300px;
	left:500px;
}
#header
{
	width:100%;
	height:80px;
	background-color:#FFFAFA;
	color:#696758;
	border-radius:5px;
}
h2
{
	position:relative;
	top:30px;
}
#lin
{
	position:absolute;
	right:20px;
	color:#696758;
	top:50px;
}
</style>
<link rel="stylesheet" type="text/css" href="css/main.css"/>
</head>
<body>
<h2></h2>
<div id="header">
<h2 align="center">COLLEGE ATTENDANCE SYSTEM</h2>
<a id="lin" href="teacherlogin.php">Teacher Login</a>
<a id="lin" style="right:130px;" href="registernewteacher.php">Teacher Register</a>
</div>
<form name="attform" method="POST" action="recattendance.php">
<table class="rolln" cellspacing="10px">
<tr><td>ROLL NUMBER</td><td><input type="text" name="rn" autofocus="autofocus"/></td></tr>
<tr><td></td><td><input type="submit" value="SUBMIT" /></td></tr>
</form>
</table>
</body>
</html>