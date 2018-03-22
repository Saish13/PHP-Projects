<?php

	include "includes/config.php";

	echo $pid=$_SESSION["pid"];
	echo $ptype=$_SESSION["type"];
	$cid=$_SESSION["user"];

	$nm=$_POST["nm"];
	$cn=$_POST["cn"];
	$ed=$_POST["ed"];
	$cvv=$_POST["cvv"];	

	echo $query="insert into carddetails values('$pid','$nm','$cn','$ed','$cvv')";	
	$run=mysql_query($query);
	
	
		if($ptype=='holidaypack')
		{
			header("location:adminpanel/displaypack.php?pid=$pid&ptype=$ptype");
		}
		if($ptype=='holidayact')
		{
			header("location:adminpanel/displayact.php?pid=$pid&ptype=$ptype");
		}
		if($ptype=='carhire')
		{
			header("location:adminpanel/displayacrhire.php?pid=$pid&ptype=$ptype");
		}
	
	
?>