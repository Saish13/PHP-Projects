<?php

	include "config.php";
		
	echo $did=$_POST["deleteid"];
	echo $dtype=$_POST["deletetype"];
	if($dtype=="holidaypack")
	{
		echo $query="select * from $dtype where package_id = '$did';";
		$run=mysql_query($query);	
		$rdata=mysql_fetch_array($run);
		$img1=$rdata['picture1'];
		$img2=$rdata['picture2'];
		$img3=$rdata['picture3'];
		$img4=$rdata['picture4'];
		@unlink($img1);
		@unlink($img2);
		@unlink($img3);
		@unlink($img4);
		$squery="select * from purchases where package_id = '$did';";
		$srun=mysql_query($squery);
		while($sdata=mysql_fetch_array($srun))
		{
			$pid=$sdata["p_id"];
			$cardq="delete from carddetails where p_id = '$pid'";
			$cardrun=mysql_query($cardq);
		}
		
		 $purq="delete from purchases where package_id = '$did'";
		$purrun=mysql_query($purq);
		
		$dquery="delete from $dtype where package_id = '$did';";
		$drun=mysql_query($dquery);
	}
	else if($dtype=="holidayact")
	{
		$query="select * from $dtype where activity_id = '$did';";		
		$run=mysql_query($query);	
		$rdata=mysql_fetch_array($run);
		$img1=$rdata['picture1'];
		$img2=$rdata['picture2'];
		$img3=$rdata['picture3'];
		@unlink($img1);
		@unlink($img2);
		@unlink($img3);	
		$squery="select * from purchases where activity_id = '$did';";
		$srun=mysql_query($squery);
		while($sdata=mysql_fetch_array($srun))
		{
			$pid=$sdata["p_id"];
			$cardq="delete from carddetails where p_id = '$pid'";
			$cardrun=mysql_query($cardq);
		}
		
		$purq="delete from purchases where activity_id = '$did'";
		$purrun=mysql_query($purq);
		
		$dquery="delete from $dtype where activity_id = '$did';";
		$drun=mysql_query($dquery);
	}
	else
	{
		$query="select * from $dtype where car_id = '$did';";
		$run=mysql_query($query);	
		$rdata=mysql_fetch_array($run);
		$img1=$rdata['picture1'];
		@unlink($img1);
		$squery="select * from purchases where car_id = '$did';";
		$srun=mysql_query($squery);
		while($sdata=mysql_fetch_array($srun))
		{
			$pid=$sdata["p_id"];
			echo $cardq="delete from carddetails where p_id = '$pid'";
			$cardrun=mysql_query($cardq);
		}
		
		$purq="delete from purchases where car_id = '$did'";
		$purrun=mysql_query($purq);
		
		$dquery="delete from $dtype where car_id = '$did';";
		$drun=mysql_query($dquery);
	}
	header("location:delete.php")
	
?>
