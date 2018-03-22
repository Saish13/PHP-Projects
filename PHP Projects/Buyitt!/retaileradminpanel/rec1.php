<?php

	include "config.php";
	
	session_start();
	
	$preusr=$_SESSION['retailer'];
	
	
	$pid=$_POST['pid'];
	$pname=$_POST['pname'];
	$ptype=$_POST['ptype'];
	$psubtype=$_POST['psubtype'];
	$pqty=$_POST['pqty'];
	$pdesc=$_POST['pdesc'];
	$psize=$_POST['psize'];
	$pcolor=$_POST['pcolor'];
	$prate=$_POST['prate'];
	$pdiscount=$_POST['pdiscount'];

	for ($i=1;$i<=4;$i++)
	{
		$filepath=pathinfo($_FILES["file".$i]["name"]);
		$extn=$filepath['extension'];
		$randfn=uniqid();

		$movepic=move_uploaded_file($_FILES["file".$i]["tmp_name"],"ProductsImages/". $randfn .".". $extn);
		if($movepic)
		{
			$imgf="ProductsImages/". $randfn .".". $extn;
			${'imgf'.$i}="imgf$i";
			${'imgf'.$i}=$imgf;
		}
	}
	
	$query="insert into product values ('$pid','$pname','$ptype','$psubtype','$pqty','$pdesc','$psize','$pcolor','$prate','$pdiscount','$imgf1','$imgf2','$imgf3','$imgf4','$preusr');";
	
	$runq=mysql_query($query);
	
	if (!$runq)
	{
		echo "<script language=\"javascript\" type=\"text/javascript\"> alert('Could not record the product'); </script>";
	}
	else
	{
		echo "<script language=\"javascript\" type=\"text/javascript\"> alert('Recorded the product'); </script>";
		header("location:addnewprod.php");
	}

	
?>