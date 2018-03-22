<?php

	include "config.php";
	
	if($_POST['packid'] && $_POST['packname'] && $_POST['rate'])
	{	
		$packid=$_POST['packid'];
		$packname=$_POST['packname'];
		$ed=$_POST['ed'];
		$sd=$_POST['sd'];
		$noc=$_POST['noc'];
		$noa=$_POST['noa'];
		$rate=$_POST['rate'];
		$dis=$_POST['dis'];
		$pd=$_POST['pd'];
		$country=$_POST['count'];
		$area=$_POST['area'];
		$state=$_POST['state'];

		for ($i=1;$i<=4;$i++)
		{
			$filepath=pathinfo($_FILES["picture".$i]["name"]);
			$extn=$filepath['extension'];
			$randfn=uniqid();

			$movepic=move_uploaded_file($_FILES["picture".$i]["tmp_name"],"contentimages/". $randfn .".". $extn);
			if($movepic)
			{
				$imgf="contentimages/". $randfn .".". $extn;
				${'imgf'.$i}="imgf$i";
				${'imgf'.$i}=$imgf;
			}
		}
		
		echo $query="insert into holidaypack values ('$packid','$packname','$sd','$ed','$noa','$noc','$pd','$count','$state','$area','$rate','$dis','$imgf1','$imgf2','$imgf3','$imgf4');";
		
		$runq=mysql_query($query);
		
		if (!$runq)
		{
			echo "<script language=\"javascript\" type=\"text/javascript\"> alert('Could not record the product'); </script>";
		}
		else
		{
			echo "<script language=\"javascript\" type=\"text/javascript\"> alert('Recorded the product'); </script>";
		}
		header("location:addnewholidaypackage.php");
	}
	header("location:addnewholidaypackage.php");

?>