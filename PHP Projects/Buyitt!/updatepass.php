<?php
	include "config.php";
	session_start();
	
	$preuser=$_SESSION["user"];
	$query="select * from customer where c_id = '$preuser';";
	$run=mysql_query($query);
	$data=mysql_fetch_array($run);
	
	$name=$data["c_name"];
	$add=$data["c_add"];
	$cn=$data["c_contactno"];
	$eml=$data["c_email"];
	$pwd=$data["c_pwd"];
	if(isset($_POST["opass"]) && isset($_POST["npass"]) && isset($_POST["repass"]) && $_POST["npass"]==$_POST["repass"])
	{
		$opass=$_POST["opass"];
		$npass=$_POST["npass"];
		$repass=$_POST["repass"];
		$oldhashpass=md5($opass);
		if($pwd==$oldhashpass)
		{
			$newhashpass=md5($npass);
			$query="update customer set c_pwd = '$newhashpass' where c_id = '$preuser';";
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
	}
	echo "<script language='javascript' type='text/javascript'>setInterval(function(){window.location.href='customerpannel.php'},1000);</script>";

?>