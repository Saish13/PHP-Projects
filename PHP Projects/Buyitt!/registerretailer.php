<?php

	include "config.php";
	session_start();
	
	if (isset($_POST["rid"]) && isset($_POST["compnm"]) && isset($_POST["tob"]) && isset($_POST["cn"]) && isset($_POST["eml"]) && isset($_POST["add"]) && isset($_POST["pass"]) && isset($_POST["repass"]) && $_POST["pass"]==$_POST["repass"])
	{
		$rid=$_POST["rid"];
		$compn=$_POST["compnm"];
		$tob=$_POST["tob"];
		$cn=$_POST["cn"];
		$eml=$_POST["eml"];
		$add=$_POST["add"];
		$appstat=0;
		$pass=$_POST["pass"];
		$qury="Insert into retailer values ('$rid','$compn','$add','$tob','$cn','$eml','$appstat','$pass')";
		$runq=mysql_query($qury);
		if($runq)
		{
			echo "<script language='javascript' type='text/javascript'>alert('Your request has been registered, please wait patiently while we cross reference your business. This might take a few days ')</script>";
		}

	}
?>
<html>
<head>
<script language="javascript" type="text/javascript" src="validation/regret.js">
</script>
<style>
#register
{
	position:absolute;
	top:190px;
	left:400px;
	height:400px;
	width:500px;
	background-color:#696758;
	border-radius:20px;
}
table
{
	position:relative;
	left:40px;
	color:white;
	top:20px;
	width:85%;
	height:90%;
}
.vimg
{
	width:22px;
	height:22px;
}
</style>
<link rel="stylesheet" type="text/css" href="css/main.css"/>
</head>
<body>
<div id="pageheader">
<h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php">BUYITT!</a></h1>
<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The online shopping website</h4>
<div id="topoptions">
</div>
<div id="line1"></div>
</div>

<div id="searchbox">

</div>
<div id="displaybox">
</br>
<h1 align="center"><u>REGISTER YOUR BUSINESS WITH BUYITT</u></h1>

<h4 align="center" style="position:absolute;left:360px;top:600px;color:red">*Please read the Terms and conditions and the Sell on Buyitt sections before registering.</h4>

<div id="register">
<table>
<form method="POST" name="regret">
<tr><td>Retailer ID</td><td> <input type="text" name="rid" onblur="val(1)"/></td><td><img src="validation/images/blank.png" class="vimg" id="rid"/></td></tr>
<tr><td>Company Name </td><td> <input type="text" name="compnm" onblur="val(2)"/></td><td><img src="validation/images/blank.png" class="vimg" id="compnm"/></td></tr>
<tr><td>Type of Business </td><td> <input type="text" name="tob" onblur="val(3)"/></td><td><img src="validation/images/blank.png" class="vimg" id="tob"/></td></tr>
<tr><td>Contact Number </td><td><input type="text" name="cn" onblur="val(4)"/></td><td><img src="validation/images/blank.png" class="vimg" id="cn"/></td></tr>
<tr><td>Email ID </td><td><input type="text" name="eml" onblur="val(5)"/></td><td><img src="validation/images/blank.png" class="vimg" id="eml"/></td></tr>
<tr><td>Password </td><td> <input type="password" name="pass" onblur="val(6)"/></td><td><img src="validation/images/blank.png" class="vimg" id="pass"/></td></tr>
<tr><td>Re-type Password </td><td> <input type="password" name="repass" onblur="val(7)"/></td><td><img src="validation/images/blank.png" class="vimg" id="repass"/></td></tr>
<tr><td>Address </td><td> <textarea name="add" onblur="val(8)"></textarea></td><td><img src="validation/images/blank.png" class="vimg" id="add"/></td></tr>
<tr><td></td><td> <input type="submit" value="submit"/></td><td></td></tr>
</form>
</table>
</div>
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
echo "<li >&nbsp;&nbsp;&nbsp;&nbsp;<b style='color:white;'>|</b>&nbsp;&nbsp;&nbsp;&nbsp;<a class='footer' href='logout.php'>LOGOUT<a></li>"; }else{} ?>
</ul>
</div>
</body>
</html>