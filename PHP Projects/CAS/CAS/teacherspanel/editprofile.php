<?php 

	include "cfg/config.php";
	
	$preuser=$_SESSION["teacher"];
	$query="select * from teachers where t_name = '$preuser';";
	$run=mysql_query($query);
	$data=mysql_fetch_array($run);
	
	$name=$data["t_name"];
	$add=$data["t_address"];
	$eml=$data["t_email"];
	$pwd=$data["t_pass"];
	
?>
<html>
<head>
<script language="javascript" src="scripts/jquery-1.10.2.min.js">
</script>
<script language="javascript" type="text/javascript">
$(document).ready(function()
{
	$("#tname").dblclick(function()
	{
		$("#tname").html("<input type='text' class='nname' name='t_name'/>");
		$(".nname").blur(function()
		{
			tempval=$(".nname").val();
			type=$(this).attr("name");
			$("#tname").html(tempval);
			$.post("updateprofile.php",{ chval:tempval,chtype:type },function(data)
			{
				$("#ajxl").html(data);
			});
		});
	});
	$("#tadd").dblclick(function()
	{
		$("#tadd").html("<input type='text' class='nadd' name='t_address'/>");
		$(".nadd").blur(function()
		{
			tempval=$(".nadd").val();
			type=$(this).attr("name");
			$("#tadd").html(tempval);
			$.post("updateprofile.php",{ chval:tempval,chtype:type },function(data)
			{
				$("#ajxl").html(data);
			});
		});
	});

	$("#teml").dblclick(function()
	{
		$("#teml").html("<input type='text' class='neml' name='t_email'/>");
		$(".neml").blur(function()
		{
			tempval=$(".neml").val();
			type=$(this).attr("name");
			$("#teml").html(tempval);
			$.post("updateprofile.php",{ chval:tempval,chtype:type },function(data)
			{
				$("#ajxl").html(data);
			});
		});
	});
});
</script>
<link rel="stylesheet" type="text/css" href="css/main.css"/>
<style>
#ajxl
{
	postion:absolute;
	width:0px;
	height:0px;
}
</style>
</head>
<body>
<h1 align="center"> EDIT PROFILE</h1><br>
</br></br></br>
<fieldset>
<form>
<h2> PERSONAL AND CONTACT INFORMATION</h2><br>
<p style="color:red">*Double click the information you want to edit</p><br>
<table width="100%" height="30%"> 
<tr><td>Address</td><td id="tadd"><?php echo $add;?></td></tr>
<tr><td>Email ID</td><td id="teml"><?php echo $eml;?></td></tr>
<tr><td></td><td></td></tr>
</table>
</form>
</fieldset>

</br></br>

<fieldset>
<h2>CHANGE PASSWORD</h2>
<form method="POST" action="updatepass.php"> 
<table width="100%" height="40%"> 
<tr><td>Enter Password</td><td><input type="password" name="opass"/></td></tr>
<tr><td>Enter New Password</td><td><input type="password" name="npass"/></td></tr>
<tr><td>Re-type New Password</td><td><input type="password" name="repass"/></td></tr>
<tr><td></td><td><input type="submit" name="submit" value="SUBMIT"/></td></tr>
</table>
</form>
</fieldset>
<div id="ajxl"></div>
</body>
</html>