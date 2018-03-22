<?php

	
	include "cfg/config.php";
	
	$usrn=$_POST['usrnm'];
	$pass=$_POST['pass'];
	
	echo $query="select * from admin where username = '$usrn' and password = '$pass';";
	$chk=mysql_query($query);
	$val=mysql_num_rows($chk);
	if ($val==1)
	{
		$_SESSION['teacher']=$usrn;
		header("location:adminpannel.php");
	}
	else
	{
		echo "<script language=\"javascript\" type=\"text/javascript\"> alert('WRONG USERNAME/PASSWORD'); </script>";
	}
	
?>