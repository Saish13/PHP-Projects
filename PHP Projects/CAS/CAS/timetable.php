<?php 

	include "cfg/config.php";
	
	if(isset($_POST["cname"]) && isset($_POST["sem"]) && isset($_POST["day"]))
	{
		$cname=$_POST["cname"];
		$sem=$_POST["sem"];
		$day=$_POST["day"];
		
		$query="select * from timetable where c_name = '$cname' and semester = '$sem' and weekday = '$day';";
		$run=mysql_query($query);
		$val=mysql_num_rows($run);
		if($val==0)
		{
			for($i=1;$i<=6;$i++)
			{
				$starttime=$_POST["starttime$i"];
				$endtime=$_POST["endtime$i"];
				$lname=$_POST["lname$i"];
				$query="insert into timetable values('$cname','$sem','$day','$starttime','$endtime','$lname')";
				$run=mysql_query($query);
			}	
		}
		else if($val>0)
		{
			echo "<script language=\"javascript\" type=\"text/javascript\"> alert('Record already exists'); </script>";
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
		if (tt.cname.value > "")
		{
			document.getElementById('cname').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('cname').src="validation/images/invalid.jpg";
		}
	}
	if (x==2)
	{
		if (tt.sem.value > "")
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
		if (tt.day.value > "")
		{
			document.getElementById('day').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('day').src="validation/images/invalid.jpg";
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
<h2>ADD A NEW TIMETABLE</h2>
<body>
<table>
<form method="POST" name="tt">
<tr><td>Course Name</td><td><select name="cname" onblur="val(1)">
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
<tr><td>Semester</td><td><select name="sem" onblur="val(2)">
<option></option>
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>6</option>
<select></td><td><img src="validation/images/blank.png" class="vimg" id="sem"/></td></tr>
<tr><td>Day</td><td><select name="day" onblur="val(3)">
<option></option>
<option>Monday</option>
<option>Tuesday</option>
<option>Wednesday</option>
<option>Thursday</option>
<option>Friday</option>
<option>Saturday</option>
</select></td><td><img src="validation/images/blank.png" class="vimg" id="day"/></td></tr>
</table>
</br></br>
<?php
	for($i=1;$i<=6;$i++)
	{
		echo "<table>";
		echo "<tr><td>Start Time</td><td><select name='starttime$i'>";
		echo "<option></option>";
		echo "<option>8:15</option>";
		echo "<option>9:00</option>";
		echo "<option>9:45</option>";
		echo "<option>10:30</option>";
		echo "<option>10:45</option>";
		echo "<option>11:30</option>";
		echo "<option>12:15</option>";
		echo "<option>13:00</option>";
		echo "</select></td><td></td>";


		echo "<td>End Time</td><td><select name='endtime$i'>";
		echo "<option></option>";
		echo "<option>9:00</option>";
		echo "<option>9:45</option>";
		echo "<option>10:30</option>";
		echo "<option>10:45</option>";
		echo "<option>11:30</option>";
		echo "<option>12:15</option>";
		echo "<option>13:00</option>";
		echo "</select></td><td></td>";
		
		
		echo "<td>Lecture Name</td><td><select name='lname$i'>";
		$query="select lecture_name from lectures group by lecture_name;";
		$runq=mysql_query($query);
		echo "<option>-</option>";
		while($rdata=mysql_fetch_array($runq))
		{
			echo "<option>".$rdata["lecture_name"]."</option>";
		}
		echo "</select></td><td></td>";
	}

?>

<tr><td></td><td><input type="submit" value="submit"></td><td></td></tr>
<table>
</form>
</table>
</body>
</html>