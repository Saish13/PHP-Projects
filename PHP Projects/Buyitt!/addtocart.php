<?php

	session_start();
	
	$pid=$_POST["pid"];
	$pname=$_POST["pname"];
	$pqty=$_POST["pqty"];
	$prate=$_POST["prate"];
	if($_SESSION["user"]!="Guest User")
	{	
		if(is_array($_SESSION["cart"]))
		{
			$li=count($_SESSION["cart"]);
			$nli=$li+1;
			$npid=intval($pid);
			for($i=0;$i<$li;$i++)
			{
				if($pid!=$_SESSION["cart"][$i]["productid"])
				{
					$flag=1;
				}
				else
				{
					$flag=0;
				}
			}
			if($flag==1)
			{
				$_SESSION["cart"][$li]["productid"]=$pid;
				$_SESSION["cart"][$li]["productname"]=$pname;
				$_SESSION["cart"][$li]["quantity"]=$pqty;
				$_SESSION["cart"][$li]["rate"]=$prate;
			}
		}	
		else
		{
			$_SESSION["cart"]=array();
			$_SESSION["cart"][0]["productid"]=$pid;
			$_SESSION["cart"][0]["productname"]=$pname;
			$_SESSION["cart"][0]["quantity"]=$pqty;
			$_SESSION["cart"][0]["rate"]=$prate;
		}
		echo var_dump($_SESSION["cart"]);
	}
?>