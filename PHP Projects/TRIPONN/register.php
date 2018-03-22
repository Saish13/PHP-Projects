<?php

	include "includes/config.php";
	
	if(isset($_POST["cid"]) && isset($_POST["cname"]) && isset($_POST["eml"]) && isset($_POST["cn"]) && isset($_POST["sex"]) && isset($_POST["age"]) && isset($_POST["pwd"]) && isset($_POST["rpwd"]) && isset($_POST["add"]) && $_POST["pwd"]==$_POST["rpwd"])
	{
		$cid=$_POST["cid"];
		$cname=$_POST["cname"];
		$eml=$_POST["eml"];
		$cn=$_POST["cn"];
		$sex=$_POST["sex"];
		$age=$_POST["age"];
		$pwd=$_POST["pwd"];
		$add=$_POST["add"];
	
		$query="insert into customer values('$cid','$cname','$add','$eml','$cn','$age','$sex','$pwd')";
		$runq=mysql_query($query);
		
		if (!$runq)
		{
			echo "<script language=\"javascript\" type=\"text/javascript\"> alert('Could not register please try later'); </script>";
		}
		else
		{
			echo "<script language=\"javascript\" type=\"text/javascript\"> alert('You have been registered'); </script>";
		}
	}
?>
<html>
<head>
<style>
#registerform
{
	width:370px;
	height:450px;
	border:3px solid grey;
	border-radius:10px;
	color:grey;
}
table
{
	left:10px;
	color:grey;
}
img
{
	width:22px;
	height:22px;
}
</style>
<script language="javascript" type="text/javascript" src="validation/regcus.js">
</script>
</head>
<body>
<div id="registerform">
<h2 align="center"> JOIN TRIPONN </h2>
<form method="POST" name="regcus">
<table cellpadding="5px">
<tr><td>Customer ID</td><td><input type="text" name="cid" onblur="val(1)"/></td><td><img src="validation/images/blank.png" id="cid"/></td></tr>
<tr><td>Customer Name</td><td><input type="text" name="cname" onblur="val(2)"/></td><td><img src="validation/images/blank.png" id="cname"/></td></tr>
<tr><td>Email ID</td><td><input type="text" name="eml" onblur="val(3)"/></td><td><img src="validation/images/blank.png" id="eml"/></td></tr>
<tr><td>Contact Number</td><td><input type="text" name="cn" onblur="val(4)"/></td><td><img src="validation/images/blank.png" id="cn"/></td></tr>
<tr><td>Sex</td><td><input type="radio" name="sex" value="male"/> Male &nbsp;&nbsp;&nbsp;<input type="radio" name="sex" value="female"/> Female</td><td></td></tr>
<tr><td>Age</td><td><input type="text" name="age" onblur="val(5)"/></td><td><img src="validation/images/blank.png" id="age"/></td></tr>
<tr><td>Password</td><td><input type="password" name="pwd" onblur="val(6)"/></td><td><img src="validation/images/blank.png" id="pwd"/></td></tr>
<tr><td>Re-type Password</td><td><input type="password" name="rpwd" onblur="val(7)"/></td><td><img src="validation/images/blank.png" id="rpwd"/></td></tr>
<tr><td>Address</td><td><textarea name="add" onblur="val(8)"></textarea></td><td><img src="validation/images/blank.png" id="add"/></td></tr>
<tr><td></td><td><input type="submit" class="btn" value="Register" name="reg"/></td><td></td></tr>
</table>
</form>
</div>
</body>
</html>