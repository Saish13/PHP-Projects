<?php

	include "config.php";
	session_start();
	
	$preusr=$_SESSION['retailer'];
	
	$did=$_POST["deleteid"];
	echo $did;
	$query="select * from product where p_id = '$did' and r_id = '$preusr';";

	$run=mysql_query($query);
	
	$rdata=mysql_fetch_array($run);
	$img1=$rdata['p_img1'];
	$img2=$rdata['p_img2'];
	$img3=$rdata['p_img3'];
	$img4=$rdata['p_img4'];
	@unlink($img1);
	@unlink($img2);
	@unlink($img3);
	@unlink($img4);
	
	$query="delete from product where p_id = '$did' and r_id = '$preusr';";
	
	$run=mysql_query($query);
	
?>
