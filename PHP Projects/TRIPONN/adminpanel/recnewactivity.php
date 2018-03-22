<?php

	include "config.php";
	if($_POST['actid'] && $_POST['actname'] && $_POST['rate'])
	{
		$actid=$_POST['actid'];
		$actname=$_POST['actname'];
		$actd=$_POST['actdate'];
		$rate=$_POST['rate'];
		$dis=$_POST['dis'];
		$ad=$_POST['ad'];
		$tnc=$_POST['tnc'];
		$country=$_POST['count'];
		$area=$_POST['area'];
		$state=$_POST['state'];

		for ($i=1;$i<=3;$i++)
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
		
		echo $query="insert into holidayact values ('$actid','$actname','$actd','$ad','$count','$state','$area','$tnc','$rate','$dis','$imgf1','$imgf2','$imgf3');";
		
		$runq=mysql_query($query);
		
		if (!$runq)
		{
			echo "<script language=\"javascript\" type=\"text/javascript\"> alert('Could not record the product'); </script>";
		}
		else
		{
			echo "<script language=\"javascript\" type=\"text/javascript\"> alert('Recorded the product'); </script>";
		}
		header("location:addnewactivity.php");
	}
	header("location:addnewactivity.php");

		
?>