<?php

	include "config.php";

	session_start();
	
	$preusr=$_SESSION['user'];

	$chval=$_POST["chval"];
	$chtype=$_POST["chtype"];
	
	$query="update customer set $chtype = '$chval' where c_id = '$preusr'; ";
	$run=mysql_query($query);

?>