<?php

	session_start();
	include "config.php";

	
	if (!empty($_POST["reg"]))
	{
		if (isset($_POST["usrn"]) && isset($_POST["name"]) && isset($_POST["add"]) && isset($_POST["cn"]) && isset($_POST["eml"]) && isset($_POST["pwd"]) && isset($_POST["rpwd"]))
		{
			$usrn=$_POST["usrn"];
			$name=$_POST["name"];
			$add=$_POST["add"];
			$cn=$_POST["cn"];
			$eml=$_POST["eml"];
			$pwd=$_POST["pwd"];
			$rpwd=$_POST["rpwd"];
			
			if ($pwd==$rpwd)
			{
				$encpwd=md5($pwd);
				$query="Insert into customer values('$usrn','$name','$add','$cn','$eml','$encpwd');";
				$run=mysql_query($query);
				if(!$run)
				{
					echo "<script language=\"javascript\" type=\"text/javascript\">	alert('Could register user, please try later');</script>";
				}
				else
				{
					echo "<script language=\"javascript\" type=\"text/javascript\">	alert('Thank you for registering, you can now login using the username and password you provided');</script>";				
				}
			}
		}
	}
	if (!empty($_POST["log"]))
	{
		if(isset($_POST["lusrn"]) && isset($_POST["lpwd"]))
		{
			$lusrn=$_POST["lusrn"];
			$lpwd=$_POST["lpwd"];
			$enclpwd=md5($lpwd);
			$query="select * from customer where c_id ='$lusrn' and c_pwd = '$enclpwd';";
			$run=mysql_query($query);
			if(mysql_num_rows($run) == 1)
			{
				$_SESSION["user"]=$lusrn;
				header("location:".$_SESSION['last_url']);
			}
		}
	}
	
?>
<html>
<head>
<script language="javascript" src="scripts/jquery-1.10.2.min.js">
</script>
<script language="javascript" type="text/javascript" src="validation/reguser.js">
</script>
<style>
#login
{
	position:absolute;
	right:90px;
	top:50px;
}
#reg
{
	position:absolute;
	left:90px;
	top:50px;
}
#main
{
	height:400px;
	width:900px;
	background-color:#696758;
	left:200px;
	position:absolute;
	top:180px;
	border-radius:10px;
	color:#FCFBE3;
}
table{color:#FCFBE3;}
#hr
{
	position:absolute;
	width:2px;
	height:360px;
	top:20px;
	background-color:#FCFBE3;
	left:480px;
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
<h1 align="center"><u>SIGNUP/LOGIN</u></h1>

<h4 align="center" style="position:absolute;left:380px;top:120px;color:red">*If you have already created an account with Buyitt, you can login with your credentials.</h4>
<div id="main">
<div id="reg">
<form method="POST" name="regusr">
<table cellpadding="5px">
<tr><td>Username</td><td><input type="text" name="usrn" onblur="val(1)"/></td><td><img src="validation/images/blank.png" class="vimg" id="usrn"/></td></tr>
<tr><td>Name</td><td><input type="text" name="name" onblur="val(2)"/></td><td><img src="validation/images/blank.png" class="vimg" id="name"/></td></tr>
<tr><td>Contact Number</td><td><input type="text" name="cn" onblur="val(3)"/></td><td><img src="validation/images/blank.png" class="vimg" id="cn"/></td></tr>
<tr><td>Email ID</td><td><input type="text" name="eml" onblur="val(4)"/></td><td><img src="validation/images/blank.png" class="vimg" id="eml"/></td></tr>
<tr><td>Password</td><td><input type="password" name="pwd" onblur="val(5)"/></td><td><img src="validation/images/blank.png" class="vimg" id="pass"/></td></tr>
<tr><td>Re-type Password</td><td><input type="password" name="rpwd" onblur="val(6)"/></td><td><img src="validation/images/blank.png" class="vimg" id="repass"/></td></tr>
<tr><td>Address</td><td><textarea name="add" onblur="val(7)"></textarea></td><td><img src="validation/images/blank.png" class="vimg" id="add"/></td></tr>
<tr><td></td><td><input type="submit" class="btn" value="Register" name="reg"/></td><td></td></tr>
</table>
</form>
</div>
<div id="hr"></div>
<div id="login">
<form method="POST">
<table cellpadding="5px">
<tr><td>Username</td><td><input type="text" name="lusrn"/></td><td></td></tr>
<tr><td>Password</td><td><input type="password" name="lpwd"/></td><td></td></tr>
<tr><td></td><td><input type="submit" class="btn" value="Login" name="log"/></td><td></td></tr>
</table>
</form>
</div>
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