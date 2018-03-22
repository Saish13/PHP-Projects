<?php

	include "config.php";
	session_start();
	
	$preusr=$_SESSION['retailer'];
	$pid=$_POST["prodid"];
	$qty=$_POST["newqty"];
	$dis=$_POST["newdis"];

	echo $preusr;
	echo $pid;
	echo $qty;
	echo $dis;
	
	$query="select * from product where p_id = '$pid' and r_id = '$preusr';";
	echo $query;
	
	$run=mysql_query($query);	
	$rdata=mysql_fetch_array($run);
	$pqty=$rdata["p_qty"];
	
	if ($qty > "" && $dis > "")
	{
		$nqty=$pqty+$qty;
		$query="update product set p_qty = $nqty, p_discount = $dis where p_id = '$pid' and r_id = '$preusr';";
	}
	elseif ($qty > "" && $dis == "")
	{
		$nqty=$pqty+$qty;
		$query="update product set p_qty = $nqty where p_id = '$pid' and r_id = '$preusr';";
	}
	elseif ($qty == "" && $dis > "")
	{
		$query="update product set p_discount = $dis where p_id = '$pid' and r_id = '$preusr';";
	}
	else
	{
	
	}
	
	echo $query;
	$run=mysql_query($query);
	
?>
