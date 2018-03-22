<?php 

	include "cfg/config.php";
	
	if(isset($_POST["rn"]) && isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["cname"]))
	{
		$rn=$_POST["rn"];
		$fname=$_POST["fname"];
		$lname=$_POST["lname"];
		$cn=$_POST["cn"];
		$eml=$_POST["eml"];
		$sex=$_POST["sex"];
		$add=$_POST["add"];
		$sem=$_POST["sem"];
		$cname=$_POST["cname"];
		
		$query="select c_id from course where c_name = '$cname'";
		$run=mysql_query($query);
		$data=mysql_fetch_array($run);
		$cid=$data["c_id"];
		
		$query="insert into student values('$rn','$fname','$lname','$add','$cn','$eml','$sem','$sex','$cid')";
		$run=mysql_query($query);
		if($run)
		{
			echo "<script language='javascript' type='text/javascript'>alert('The Student has been recorded')</script>";
		}
	}

?>
<html>
<head>
<script language="javascript" type="text/javascript">
function val(x)
{
	var alpha=/[A-Za-z'_]$/;
	if (x==1)
	{
		if (/[BCAOM0-9]$/.test(sreg.rn.value))
		{
			document.getElementById('rn').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('rn').src="validation/images/invalid.jpg";
		}
	}
	if (x==2)
	{
		if (/[A-Za-z0-9'_-]$/.test(sreg.fname.value))
		{
			document.getElementById('fname').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('fname').src="validation/images/invalid.jpg";
		}
	}
	if (x==3)
	{
		if (alpha.test(sreg.lname.value))
		{
			document.getElementById('lname').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('lname').src="validation/images/invalid.jpg";
		}
	}
	if (x==4)
	{
		if (/[0-9]/.test(sreg.cn.value) && sreg.cn.value.length == 10)
		{
			document.getElementById('cn').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('cn').src="validation/images/invalid.jpg";
		}
	}
	if (x==5)
	{
		if (((sreg.eml.value.indexOf(".") > 0) && (sreg.eml.value.indexOf("@") > 0)) && (alpha.test(sreg.eml.value)))
		{
			document.getElementById('eml').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('eml').src="validation/images/invalid.jpg";
		}
	}
	if (x==6)
	{
		
	}
	if (x==8)
	{
		if (sreg.sem.value > "")
		{
			document.getElementById('sem').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('sem').src="validation/images/invalid.jpg";
		}
	
	}
	if (x==7)
	{
		if (sreg.add.value > "")
		{
			document.getElementById('add').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('add').src="validation/images/invalid.jpg";
		}
	}
	if (x==9)
	{
		if (sreg.cname.value > "")
		{
			document.getElementById('cname').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('cname').src="validation/images/invalid.jpg";
		}
	}

}
</script>
<link rel="stylesheet" type="text/css" href="css/main.css"/>
<style>
.vimg
{
	height:22px;
	width:22px;
}
</style>
</head>
<h2>ADD A NEW STUDENT</h2>
<body>
<table>
<form method="POST" name="sreg">
<tr><td>Roll Number</td><td><input type="text" name="rn" onblur="val(1)"></td><td><img src="validation/images/blank.png" class="vimg" id="rn"/></td></tr>
<tr><td>First Name</td><td><input type="text" name="fname" onblur="val(2)"></td><td><img src="validation/images/blank.png" class="vimg" id="fname"/></td></tr>
<tr><td>Last Name</td><td><input type="text" name="lname" onblur="val(3)"></td><td><img src="validation/images/blank.png" class="vimg" id="lname"/></td></tr>
<tr><td>Contact Number</td><td><input type="text" name="cn" onblur="val(4)"></td><td><img src="validation/images/blank.png" class="vimg" id="cn"/></td></tr>
<tr><td>Email ID</td><td><input type="text" name="eml" onblur="val(5)"></td><td><img src="validation/images/blank.png" class="vimg" id="eml"/></td></tr>
<tr><td>Gender</td><td><input type="radio" name="sex" value="Male">Male &nbsp;&nbsp;&nbsp;<input type="radio" name="sex" value="Female">Female </td><td><img src="validation/images/blank.png" class="vimg" id="usrn"/></td></tr>
<tr><td>Address</td><td><textarea name="add" onblur="val(7)"></textarea></td><td><img src="validation/images/blank.png" class="vimg" id="add"/></td></tr>


<tr><td>Semester</td><td><select name="sem" onblur="val(8)">
<option></option>
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>6</option>
<select></td><td><img src="validation/images/blank.png" class="vimg" id="sem"/></td></tr>


<tr><td>Course Name</td><td><select name="cname" onblur="val(9)">
<?php
	$query="select c_name from course group by c_name;";
	$runq=mysql_query($query);
	echo "<option></option>";
	while($rdata=mysql_fetch_array($runq))
	{
		echo "<option>".$rdata["c_name"]."</option>";
	}
?>
<select></td><td><img src="validation/images/blank.png" class="vimg" id="cname"/></td></tr>

<tr><td></td><td><input type="submit" value="SUBMIT"></td><td></td></tr>
</form>
</table>
</body>
</html>