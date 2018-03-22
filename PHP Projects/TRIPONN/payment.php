<?php

	include "includes/config.php";
	
	
	$cid=$_SESSION["user"];
	
	
?>
<html>
<head>
<script language="javascript" src="scripts/jquery-1.10.2.min.js">
</script>
<script language="javascript" type="text/javascript">
</script>
<link rel="stylesheet" type="text/css" href="css/triponn.css"/>
</head>
<style>
#psb
{
	position:absolute;
	top:20px;
	left:10px;
}
img.content
{
	width:250px;
	height:200px;
}
fieldset.cardform
{
	width:70%;
	position:absolute;
	left:160px;
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

<div id="displaybox">
<fieldset class="cardform">
<legend><b>FILL CARD DETAILS</b></legend>
<form method="POST" action="reccarddetails.php">
<table cellspacing="10px" cellpadding="10px">
<tr><td>NAME (full name as on the card)</td><td><input type="text" name="nm"/></td><td></td></tr>
<tr><td>Card number</td><td><input type="text" name="cn"/></td><td></td></tr>
<tr><td>Expiry Date</td><td><input type="text" name="ed"/></td><td></td>
<td>CVV number</td><td><input type="text" name="cvv"/></td><td></td></tr>
<td></td><td><input type="submit" name="submit" value="submit"/></td><td></td></tr>
</table>
</form>
</fieldset>
</div>

<div id="pagefooter">
</div>

</body>
</html>