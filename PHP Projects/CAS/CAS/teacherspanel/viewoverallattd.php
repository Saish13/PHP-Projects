<?php

	include "cfg/config.php";

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/main.css"/>

<style>
table
{
	text-align:center;
}
#options
{
	position:absolute;
	left:90px;
}
#disp
{
	position:absolute;
	top:80px;
	width:100%;
	left:0px;
}
</style>
</head>
<body>
<div id="options">
<form method="POST">
<table>
<tr><td>COURSE</td><td>
<select name="course">
<?php
	$query="select c_name from course group by c_name;";
	$runq=mysql_query($query);
	echo "<option></option>";
	while($rdata=mysql_fetch_array($runq))
	{
		echo "<option>".$rdata["c_name"]."</option>";
	}
?>
</select>
</td><td>SEMESTER</td><td>
<select name="sem">
<option></option>
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>6</option>
</select>
</td>
<td>FROM</td><td><input type="date" name="fdate"/></td>
<td>TO</td><td><input type="date" name="todate"/></td>
<td></td><td><input type="submit" value="search" name="tdate"/></td><tr>
</form>
</table> 
</div>
<div id="disp">
<?php

	if(isset($_POST["course"]) && isset($_POST["sem"]) && isset($_POST["course"]) && isset($_POST["course"]) && isset($_POST["course"]))
	{
		$course=$_POST["course"];
		$sem=$_POST["sem"];
		$qry="select * from course where c_name = '$course'";
		$runc=mysql_query($qry);
		$cdata=mysql_fetch_array($runc);
		$cid=$cdata["c_id"];
		$fdate=$_POST["fdate"];
		$tdate=$_POST["todate"];
		$nwdate=strtotime($fdate);
		$nwndate=strtotime($tdate);
		$diff=$nwndate-$nwdate;
		$days=floor($diff/(60*60*24));
		$compdate=$fdate;
		$totlec=0;
		for($i=0;$i<=$days;$i++)
		{
			$day=date("l", strtotime($compdate));
			$sqlstr="select * from timetable where weekday='$day' and semester='$sem';";
			$runsql=mysql_query($sqlstr);
			while($sqldata=mysql_fetch_array($runsql))
			{
				if($sqldata["lecture_name"] != "--")
				{
					
					{
						$sqldata["lecture_name"];
						$val=1;
						$totlec=$totlec+$val;
					}
				}
			}
			$compdate=date("d-m-Y",strtotime($compdate."+1 days"));
		}

		$query="select *,count(attendance) as totatt from attendance where semester = '$sem' and c_id = '$cid' and attendance like 'P' and curr_date >= '$fdate' and curr_date <= '$tdate' group by roll_no ";
		$run=mysql_query($query);
		echo "<table border='1px' width='100%'>";
		echo "<tr><td>Roll no</td><td>Name</td><td>Sex</td><td>Semester</td>";
		$q="select * from lectures,course where course.c_id='$cid' and semester='$sem' and lectures.c_name=course.c_name;";
		$ru=mysql_query($q);
		while($da=mysql_fetch_array($ru))
		{
			if($da["lecture_name"]!="--")
			{
				echo "<td>".$da['lecture_name']."</td>";
			}
		}
		echo "<td>Lectures attended</td><td>Total number of lectures</td><td>Percentage of lectures attended</td></tr>";
		while($data=mysql_fetch_array($run))
		{
			$rno=$data["roll_no"];
			$qury="select * from student where roll_no = '$rno';";
			$runq=mysql_query($qury);
			$qdata=mysql_fetch_array($runq);
			$per=$data["totatt"]/$totlec*100;
			$per=floor($per);
			echo "<tr><td>$rno</td><td>".$qdata["first_name"]." ".$qdata["last_name"]."</td><td>".$qdata["sex"]."</td>";
			echo "<td>".$data["semester"]."</td>";
			$query="select * from lectures,course where course.c_id='$cid' and semester='$sem' and lectures.c_name=course.c_name;";
			$subqry=mysql_query($query);
			while($subdata=mysql_fetch_array($subqry))
			{
				$lname=$subdata["lecture_name"];
				if($lname!= "--")
				{
					$compdate=$fdate;
					$days=floor($diff/(60*60*24));
					$totsublec=0;
					for($i=0;$i<=$days;$i++)
					{
						$day=date("l", strtotime($compdate));
						$qdate=date("Y-m-d", strtotime($compdate));
						$sqlstr="select count(lecture_name) from timetable where weekday='$day' and semester='$sem' and lecture_name='$lname';";
						$runsql=mysql_query($sqlstr);
						$sqldata=mysql_fetch_array($runsql);
						$val=$sqldata["count(lecture_name)"];
						$chkholquery="select * from attendance where curr_date = \"$qdate\"";
						$chkholrun=mysql_query($chkholquery);
						$rowval=mysql_num_rows($chkholrun);
						if($rowval > 0)
						{
							$totsublec=$totsublec+$val;
						}
						$compdate=date("d-m-Y",strtotime($compdate."+1 days"));
					}
					$qy="select *,count(attendance) as totattt from attendance where semester = '$sem' and lecture_name = '$lname' and c_id = '$cid' and roll_no='$rno' and attendance like 'P' and curr_date >= '$fdate' and curr_date <= '$tdate' group by roll_no ";
					$rn=mysql_query($qy);
					$ldata=mysql_fetch_array($rn);
					$percentage=$ldata["totattt"]/$totsublec*100;
					$percentage=floor($percentage);
					echo "<td>$percentage %</td>";
				}
			}
			echo "<td>".$data["totatt"]."</td><td>$totlec</td><td>$per%</td></tr>";
		}
		echo "</table>";
	}
	
?>
</div>
</body>
</html>