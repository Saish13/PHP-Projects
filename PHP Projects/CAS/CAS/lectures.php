<?php 

	include "cfg/config.php";
	
	if(isset($_POST["cid"]) && isset($_POST["sem"]) && isset($_POST["tname"]) && isset($_POST["lname"]))
	{
		$cid=$_POST["cid"];
		$sem=$_POST["sem"];
		$tname=$_POST["tname"];
		$lname=$_POST["lname"];
	
		$query="insert into lectures values('$cid','$sem','$tname','$lname')";
		$run=mysql_query($query);
		if($run)
		{
			echo "<script language='javascript' type='text/javascript'>alert('The lecture has been recorded')</script>";
		}
	}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/main.css"/>
<script language="javascript" type="text/javascript">
function val(x)
{
	var alpha=/[A-Za-z'_]$/;
	var alphanum=/[A-Za-z0-9'_]$/;
	if (x==1)
	{
		if (lreg.cid.value > "")
		{
			document.getElementById('cid').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('cid').src="validation/images/invalid.jpg";
		}
	}
	if (x==2)
	{
		if (lreg.sem.value > "")
		{
			document.getElementById('sem').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('sem').src="validation/images/invalid.jpg";
		}
	}
	if (x==3)
	{
		if (lreg.tname.value > "")
		{
			document.getElementById('tname').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('tname').src="validation/images/invalid.jpg";
		}
	}
	if (x==4)
	{
		if (alpha.test(lreg.lname.value))
		{
			document.getElementById('lname').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('lname').src="validation/images/invalid.jpg";
		}
	}
}
</script>
<style>
.vimg
{
	height:22px;
	width:22px;
}
</style>
</head>
<h2>ADD A NEW LECTURE</h2>
<body>
<table>
<form method="POST" name="lreg">
<tr><td>Course Name</td><td><select name="cid" onblur="val(1)">
<?php
	$query="select c_name from course group by c_name;";
	$runq=mysql_query($query);
	echo "<option></option>";
	while($rdata=mysql_fetch_array($runq))
	{
		echo "<option>".$rdata["c_name"]."</option>";
	}
?>
<select></td><td><img src="validation/images/blank.png" class="vimg" id="cid"/></td></tr>
<tr><td>Semester</td><td><select name="sem" onblur="val(2)">
<option></option>
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>6</option>
<select></td><td><img src="validation/images/blank.png" class="vimg" id="sem"/></td></tr>
<tr><td>Teacher Name</td><td><select name="tname" onblur="val(3)">
<?php
	$query="select t_name from teachers group by t_name;";
	$runq=mysql_query($query);
	echo "<option></option>";
	while($rdata=mysql_fetch_array($runq))
	{
		echo "<option>".$rdata["t_name"]."</option>";
	}
?>
</select></td><td><img src="validation/images/blank.png" class="vimg" id="tname"/></td></tr>
<tr><td>Lecture Name</td><td><input type="text" name="lname" onblur="val(4)"></td><td><img src="validation/images/blank.png" class="vimg" id="lname"/></td></tr>
<tr><td></td><td><input type="submit" value="submit"></td><td></td></tr>
</form>
</table>
</body>
</html>