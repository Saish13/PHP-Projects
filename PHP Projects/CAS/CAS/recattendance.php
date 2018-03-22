<?php 


	include "cfg/config.php";
	$rn=$_POST["rn"];
	$attid=uniqid();
	$cdate=date("Y-m-d");	
	$ctime=date("h:i:s");
	$day=date("l");
	$query="select * from student,course where student.c_id = course.c_id and student.roll_no = '$rn'";
	$run=mysql_query($query);
	$data=mysql_fetch_array($run);
	$cid=$data["c_id"];
	$cname=$data["c_name"];
	$sem=$data["semester"];
	$query=" select * from timetable where c_name= '$cname' and semester = '$sem' and weekday = '$day' and lecture_start_time <= '$ctime' and lecture_end_time > '$ctime' ;";
	$run=mysql_query($query);
	$data=mysql_fetch_array($run);
	$lecstrt=$data["lecture_start_time"];
	$lecname=$data["lecture_name"];
	$attp="P";
	$bantime=date("h:i:s",strtotime('+5 minutes',strtotime($lecstrt)));
	if($ctime<=$bantime)
	{
		echo $query="insert into attendance values ('$attid','$rn','$cdate','$ctime','$cid','$sem','$lecname','$attp')";
		$run=mysql_query($query);
	}
	echo "<script language='javascript' type='text/javascript'>setInterval(function(){window.location.href='index.php'},2000);</script>";

	
?>