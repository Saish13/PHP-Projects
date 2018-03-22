<?php 

	include "cfg/config.php";
	
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/main.css"/>
</head>
<h2>VIEW TIMETABLE</h2>
<body>
<form method="POST">
<table>
<tr><td>CLASS </td><td> <select name="class">
<?php
	$query="select c_name from course group by c_name;";
	$runq=mysql_query($query);
	echo "<option></option>";
	while($rdata=mysql_fetch_array($runq))
	{
		echo "<option>".$rdata["c_name"]."</option>";
	}
?>
</select></td><td></td>
<td>Semester</td><td><select name="sem">
<option></option>
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>6</option>
</select></td><td><input type="submit" value="SEARCH"/></td>
</td><td><input type="submit" value="DELETE" name="delete"/></td></tr>
</table>
</form>
<div id="disp">
<?php

	$wday=array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
	$cls=$_POST["class"];
	$sem=$_POST["sem"];
	if (isset($_POST["class"]) && isset($_POST["sem"]))
	{
		if ($_POST["class"]>"" && $_POST["sem"]>"")
		{
			echo "<table border='1px' width='90%' align='center'>";
			echo "<tr><td></td><td>8:15 AM - 9:00 AM</td><td>9:00 AM - 9:45 AM</td><td>9:45 AM - 10:30 AM</td><td>10:45 AM - 11:30 AM</td><td>11:30 AM - 12:15 PM</td><td>12:15 PM - 1:00 PM</td></tr>";
			for($i=0;$i<6;$i++)
			{
				
				$query="select * from timetable where c_name = '$cls' and semester = '$sem' and weekday = '$wday[$i]';";
				$run=mysql_query($query);
				$rdata=mysql_fetch_array($run);
				echo "<tr>";
				echo "<td>".$rdata['weekday']."</td>";
				echo "<td>".$rdata['lecture_name']."</td>";
				while($data=mysql_fetch_array($run))
				{
					echo "<td>".$data['lecture_name']."</td>";
				}
				echo "</tr>";
			}
			echo "</table>";
		}
		
		if(!empty($_POST["delete"]))
		{
			echo $query="delete from timetable where c_name = '$cls' and semester = '$sem';";
			$run=mysql_query($query);
			if (!$run)
			{
				echo "<script language=\"javascript\" type=\"text/javascript\"> alert('Could not delete the timetable'); </script>";
			}
			else
			{
				echo "<script language=\"javascript\" type=\"text/javascript\"> alert('Deleted the timetable'); </script>";
			}
		}
	}

?>
</div>
</form>

</body>
</html>