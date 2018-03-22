<?php

	include "includes/config.php";

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
	//$("#registerbox").load("register.php");
});
</script>
<link rel="stylesheet" type="text/css" href="css/triponn.css"/>
</head>
<style>
#searchbox
{
	position:absolute;
	width:55%;
	height:150px;
	left:0px;
	top:250px;
	z-index:1;
	background-color:#FFFFAA;
	border-radius:10px;
	left:30px;
}
table
{
	position:absolute;
	top:80px;
}
h2.head2
{
	position:absolute;
	left:50px;
}
</style>
<body>
<div id="pageheader">
<h1 align="left">&nbsp;&nbsp;&nbsp;&nbsp;TRIPONN</h1>
<div id="topoptions">
<ul>
<li><a href="login.php" class="lognreg">Login</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</li>
<li><a href="register.php" class="lognreg">Register</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</li>
<li><a href="customerpannel.php" class="curruser" id="<?php echo $_SESSION["user"]; ?>"><?php echo $_SESSION["user"]; ?></a></li>
</ul>
</div>
<div id="line"></div>
</div>

<div id="searchbox">
<h2 class="head2">SEARCH :<h2>
<form action="search.php" method="GET">
<table id="psb" cellpadding="5px">
<tr>
<td>Type</td>
<td><select name="type">
<option></option>
<option>Holiday Packages</option>
<option>Activities</option>
<option>Car hire</option>
</select></td>
<td>To</td>
<td><input type="text" id="search" name="name" value="" size="50"/></td><td><input type="submit" value="SEARCH"/></td></tr>
</table>
</form>
</div>

<div id="displaybox">

<div id="registerbox">
</div>

</div>

<div id="pagefooter">

</div>

</body>
</html>