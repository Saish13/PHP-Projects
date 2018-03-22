<?php

	include "includes/config.php";

	$cid=$_SESSION["user"];
	$pid=uniqid();
	$n1=$_POST["n1"];
	$n2=$_POST["n2"];
	$n3=$_POST["n3"];
	$n4=$_POST["n4"];
	$n5=$_POST["n5"];
	$addn=$_POST["addn"];
	$nwdate=date("Y-m-d");
	$nwtime=date("h:i:s");
	$id=$_POST["id"];
	$typ=$_POST["typ"];
	$rate=$_POST["rate"];
	
	$_SESSION['type']=$typ;
	
	if($typ=="holidaypack")
	{
		$query="insert into purchases values('$pid','$cid','$id','0','0','$rate','$nwdate','$nwtime','$n1','$n2','$n3','$n4','$n5','$addn')";
	}
	if($typ=="holidayact")
	{
		$query="insert into purchases values('$pid','$cid','0','$id','0','$rate','$nwdate','$nwtime','$n1','$n2','$n3','$n4','$n5','$addn')";
	}
	if($typ=="carhire")
	{
		$query="insert into purchases values('$pid','$cid','0','0','$id','$rate','$nwdate','$nwtime','$n1','$n2','$n3','$n4','$n5','$addn')";
	}
	
	$_SESSION["pid"]=$pid;
	
	
	$run=mysql_query($query);
	if($run)
	{
		header("location:payment.php");
	}
	
?>