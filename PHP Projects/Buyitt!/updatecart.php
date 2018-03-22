<?php

	session_start();
	
	include "config.php";

	$pid=$_POST["pid"];
	$nqty=$_POST["nqty"];
	echo $pid;
	echo $nqty;
	
	$query="select * from product where p_id='$pid'";
	$run=mysql_query($query);
	$rdata=mysql_fetch_array($run);
	$li=count($_SESSION["cart"]);
	if($nqty<$rdata["p_id"])
	{
		for($i=0;$i<$li;$i++)
		{
			if($pid==$_SESSION["cart"][$i]["productid"])
			{
				$_SESSION["cart"][$i]["quantity"]=$nqty;
			}
		}
	}
?>