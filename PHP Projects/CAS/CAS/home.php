<?php

	include "cfg/config.php";
	
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
<script language="javascript" type="text/javascript">

</script>
</head>
<style>
body
{
	height:100%;
}
#pageheader
{
	position:absolute;
	width:100%;
	top:0px;
	height:150px;
	background-color:#F0F8FF;
	left:0px;
}
#searchbox
{
	position:absolute;
	width:100%;
	height:160px;
	background-color:#696969;
	left:0px;
	top:100px;
}
#displaybox
{
	position:relative;	
	width:100%;
	top:250px;
	min-height:100%;
	left:0px;
}
#topoptions
{
	position:absolute;
	right:30px;
	top:-10px;
}
</style>
<body>
<div id="pageheader">
<h1 align="center">COLLEGE ATTENDANCE SYSTEM</h1>
<div id="topoptions">
<ul>
<li></li>
</ul>
</div>
</div>
<div id="searchbox">

</div>
<div id="displaybox">
</div>

</body>
</html>