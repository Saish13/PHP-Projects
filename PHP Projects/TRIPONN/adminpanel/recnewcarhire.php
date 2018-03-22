<?php

	include "config.php";
	
	if($_POST['carid'] && $_POST['carname'] && $_POST['rate'])
	{
		$carid=$_POST['carid'];
		$carname=$_POST['carname'];
		$pq=$_POST['pq'];
		$ac=$_POST['ac'];
		$gear=$_POST['gear'];
		$bag=$_POST['bagg'];
		$lby=$_POST['leasedby'];
		$rate=$_POST['rate'];
		$addet=$_POST['addet'];

		$filepath=pathinfo($_FILES["picture"]["name"]);
		$extn=$filepath['extension'];
		$randfn=uniqid();

		$movepic=move_uploaded_file($_FILES["picture"]["tmp_name"],"contentimages/". $randfn .".". $extn);
		if($movepic)
		{
			$imgloc="contentimages/". $randfn .".". $extn;
		}
		
		
		echo $query="insert into carhire values ('$carid','$carname','$imgloc','$pq','$ac','$gear','$bag','$lby','$rate','$addet');";
		
		$runq=mysql_query($query);
		
		if (!$runq)
		{
			echo "<script language=\"javascript\" type=\"text/javascript\"> alert('Could not record the product'); </script>";
		}
		else
		{
			echo "<script language=\"javascript\" type=\"text/javascript\"> alert('Recorded the product'); </script>";
		}
		header("location:addnewcarhire.php");
	}	
	header("location:addnewcarhire.php");
?>