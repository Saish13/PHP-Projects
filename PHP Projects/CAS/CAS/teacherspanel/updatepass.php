<?php

	include "cfg/config.php";
	
	$preuser=$_SESSION["teacher"];
	$query="select * from teachers where t_id = '$preuser';";
	$run=mysql_query($query);
	$data=mysql_fetch_array($run);
	

	$pwd=$data["t_pass"];
	if(isset($_POST["opass"]) && isset($_POST["npass"]) && isset($_POST["repass"]) && $_POST["npass"]==$_POST["repass"])
	{
		$opass=$_POST["opass"];
		$npass=$_POST["npass"];
		$repass=$_POST["repass"];
		$query="update teachers set t_pass = '$npass' where t_name = '$preuser';";
		$run=mysql_query($query);
		if($run)
		{
			echo "<script language=\"javascript\" type=\"text/javascript\"> alert('Your password has been changed'); </script>";
		}
		else
		{
			echo "<script language=\"javascript\" type=\"text/javascript\"> alert('Error while changing password please try later'); </script>";		
		}
	
	}
	echo "<script language='javascript' type='text/javascript'>setInterval(function(){window.location.href='teacherpanel.php'},1000);</script>";

?>