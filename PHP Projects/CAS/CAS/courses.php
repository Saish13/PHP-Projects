<?php 

	include "cfg/config.php";
	
	if(isset($_POST["cid"]) && isset($_POST["cname"]) && isset($_POST["dur"]) && isset($_POST["nos"]))
	{
		$cid=$_POST["cid"];
		$cname=$_POST["cname"];
		$dur=$_POST["dur"];
		$nos=$_POST["nos"];
	
		$query="insert into course values('$cid','$cname','$dur','$nos')";
		$run=mysql_query($query);
		if($run)
		{
			echo "<script language='javascript' type='text/javascript'>alert('The course has been recorded')</script>";
		}
	}
?>
<html>
<head>
<script language="javascript" type="text/javascript">
function val(x)
{
	var alpha=/[A-Za-z'_]$/;
	var alphanum=/[A-Za-z0-9'_]$/;
	if (x==1)
	{
		if (/[0-9]/.test(creg.cid.value))
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
		if (alpha.test(creg.cname.value))
		{
			document.getElementById('cname').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('cname').src="validation/images/invalid.jpg";
		}
	}
	if (x==3)
	{
		if (alphanum.test(creg.dur.value))
		{
			document.getElementById('dur').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('dur').src="validation/images/invalid.jpg";
		}
	}
	if (x==4)
	{
		if (/[0-9]/.test(creg.nos.value) && creg.nos.value.length == 1)
		{
			document.getElementById('nos').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('nos').src="validation/images/invalid.jpg";
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
<link rel="stylesheet" type="text/css" href="css/main.css"/>
</head>
<h2>ADD A NEW COURSE</h2>
<body>
<table>
<form method="POST" name="creg">
<tr><td>Course ID</td><td><input type="text" name="cid" onblur="val(1)"></td><td><img src="validation/images/blank.png" class="vimg" id="cid"/></td></tr>
<tr><td>Course Name</td><td><input type="text" name="cname" onblur="val(2)"></td><td><img src="validation/images/blank.png" class="vimg" id="cname"/></td></tr>
<tr><td>Duration</td><td><input type="text" name="dur" onblur="val(3)"></td><td><img src="validation/images/blank.png" class="vimg" id="dur"/></td></tr>
<tr><td>No of semesters</td><td><input type="text" name="nos" onblur="val(4)"></td><td><img src="validation/images/blank.png" class="vimg" id="nos"/></td></tr>
<tr><td></td><td><input type="submit" value="submit"></td><td></td></tr>
</form>
</table>
</body>
</html>