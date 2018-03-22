<?php

	session_start();
	include "config.php";

	$pid=$_POST["pid"];
	echo $pid;
	$li=count($_SESSION["cart"]);
	for ($i=0;$i<$li;$i++)
	{
		if($pid==$_SESSION["cart"][$i]["productid"])
		{
			echo $_SESSION["cart"][$i]["productid"]."</br>";
			$deleteindex=$i;
			echo $i."</br>";
		}
	}
	echo $deleteindex;
	if($deleteindex>=0)
	{
		unset($_SESSION["cart"][$deleteindex]);
		$_SESSION["cart"]=array_values($_SESSION["cart"]);
		if($li==1)
		{
			unset($_SESSION["cart"]);
		}
	}
?>