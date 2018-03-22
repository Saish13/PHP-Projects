<?php

	include "cfg/config.php";
	
	$preusr=$_SESSION['teacher'];
	$qry="select * from teachers where t_name = '$preusr';";
	$run=mysql_query($qry);
	$rdata=mysql_fetch_array($run);
	$tid=$rdata["t_id"];
	
	$chval=$_POST["chval"];
	$chtype=$_POST["chtype"];
	
	$query="update teachers set $chtype = '$chval' where t_id = '$tid'; ";
	$run=mysql_query($query);

?>