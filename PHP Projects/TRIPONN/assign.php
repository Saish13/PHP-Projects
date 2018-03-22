<?php

	echo $id=$_GET["prod"];
	echo $type=$_GET["tt"];
	if($type=="holidaypack")
	{
		header("location:disppackage.php?type=holidaypack&id=$id");
	}
	if($type=="holidayact")
	{
		header("location:dispactivity.php?type=holidayact&id=$id");
	}
	if($type=="carhire")
	{
		header("location:dispcarhire.php?type=carhire&id=$id");
	}
?>