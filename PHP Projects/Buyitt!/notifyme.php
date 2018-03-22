<?php

	session_start();
	include "config.php";
	
	$pid=$_POST["pid"];
	$cid=$_SESSION["user"];
	
	$query="insert into check_avail values('$cid','$pid');";
	$run=mysql_query($query);



?>