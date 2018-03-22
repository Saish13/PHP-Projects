<?php
	
	include "cfg/config.php";

	$rn=$_POST["rn"];
	$fdate=$_POST["fdate"];
	$tdate=$_POST["tdate"];
	
	$nwdate=strtotime($fdate);
	$nwndate=strtotime($tdate);
	$diff=$nwndate-$nwdate;
	$days=floor($diff/(60*60*24));
	
	$query="select * from student where roll_no = '$rn'";
	$run=mysql_query($query);
	$rdata=mysql_fetch_array($run);
	$cid=$rdata["c_id"];
	$sem=$rdata["semester"];
	$td=$fdate;
	for($i=0;$i<=$days;$i++)
	{
		$dstr=strtotime($td);
		$day=date("l", $dstr);
		$attp="P";
		$query="select * from timetable where weekday = '$day' and semester = '$sem';";
		$runq=mysql_query($query);
		while($data=mysql_fetch_array($runq))
		{
			$attid=uniqid();
			$lecname=$data["lecture_name"];
			$ctime=$data["lecture_start_time"];
			$cdate=$td;
			if($data["lecture_name"]!="--")
			{
				$query="insert into attendance values ('$attid','$rn','$cdate','$ctime','$cid','$sem','$lecname','$attp');";
				$run=mysql_query($query);
			}
		}
		$td=date("Y-m-d",strtotime('+1 days',strtotime($td)));
	}
	header("location:ondutyform.php");
?>