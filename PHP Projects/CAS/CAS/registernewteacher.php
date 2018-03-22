<?php 

	include "cfg/config.php";

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/main.css"/>
<script language="javascript" type="text/javascript">
function val(x)
{
	var alphanum=/[A-Za-z0-9'_]$/;
	var alpha=/[A-Za-z'_]$/;
	if (x==1)
	{
		if (alphanum.test(regt.tid.value))
		{
			document.getElementById('tid').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('tid').src="validation/images/invalid.jpg";
		}
	}
	if (x==2)
	{
		if (alpha.test(regt.tname.value))
		{
			document.getElementById('tname').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('tname').src="validation/images/invalid.jpg";
		}
	}
	if (x==3)
	{
		if (((regt.eml.value.indexOf(".") > 0) && (regt.eml.value.indexOf("@") > 0)) && (alpha.test(regt.eml.value)))
		{
			document.getElementById('eml').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('eml').src="validation/images/invalid.jpg";
		}
	}
	if (x==4)
	{
		if (/[A-Za-z0-9_-]$/.test(regt.pwd.value) && regt.pwd.value!="")
		{
			document.getElementById('pwd').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('pwd').src="validation/images/invalid.jpg";
		}	
	}
	if (x==5)
	{
		if (/[A-Za-z0-9_-]$/.test(regt.rpwd.value) && regt.rpwd.value!="" && regt.rpwd.value==regt.pwd.value)
		{
			document.getElementById('rpwd').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('rpwd').src="validation/images/invalid.jpg";
		}
	
	}
	if (x==6)
	{
		if (regt.add.value > "")
		{
			document.getElementById('add').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('add').src="validation/images/invalid.jpg";
		}
	}
}
</script>
<style>
body
{
	background-image:url("images/background.jpg");
}
.vimg
{
	height:22px;
	width:22px;
}
</style>
</head>
<body>
</br></br></br>
<h1 align="center">REGISTER NEW TEACHER</h1>
</br></br></br></br></br></br></br>
<fieldset>
<table align="center">
<form method="POST" name="regt" action="recordteacher.php">
<tr><td>Teacher ID</td><td><input type="text" name="tid" onblur="val(1)"></td><td><img src="validation/images/blank.png" class="vimg" id="tid"/></td></tr>
<tr><td>Name</td><td><input type="text" name="tname" onblur="val(2)"></td><td><img src="validation/images/blank.png" class="vimg" id="tname"/></td></tr>
<tr><td>Email ID</td><td><input type="text" name="eml" onblur="val(3)"></td><td><img src="validation/images/blank.png" class="vimg" id="eml"/></td></tr>
<tr><td>Password</td><td><input type="password" name="pwd" onblur="val(4)"></td><td><img src="validation/images/blank.png" class="vimg" id="pwd"/></td></tr>
<tr><td>Re-type Password</td><td><input type="password" name="rpwd" onblur="val(5)"></td><td><img src="validation/images/blank.png" class="vimg" id="rpwd"/></td></tr>
<tr><td>Address </td><td><textarea name="add" onblur="val(6)"></textarea></td><td><img src="validation/images/blank.png" class="vimg" id="add"/></td></tr>
<tr><td></td><td><input type="submit" value="submit"></td><td></td></tr>
</form>
</table>
</fieldset>
</body>
</html>