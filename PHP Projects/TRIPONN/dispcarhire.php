<?php

	include "includes/config.php";

	if(!isset($_SESSION["user"]))
	{
		$_SESSION["user"]="Guest User";
	}
	else
	{
		$user=$_SESSION["user"];
	}
	
	echo $type=$_GET["type"];
	echo $id=$_GET["id"];
	echo $query="select * from $type where car_id = '$id';";
	$run=mysql_query($query);
	$data=mysql_fetch_array($run);
	$cname=$data["car_name"];
	$ad=$data["add_details"];
	$pqty=$data["passenger_qty"];
	$ac=$data["air_cond"];
	$gear=$data["gear"];
	$bag=$data["baggage"];
	$lby=$data["leased_by"];
	$rate=$data["rate"];
	$pic1="adminpanel/".$data["picture1"];
?>
<html>
<head>
<script language="javascript" src="scripts/jquery-1.10.2.min.js">
</script>
<script language="javascript" type="text/javascript">
$(document).ready(function()
{
	$(".addcart").click(function()
	{
		id=$(this).attr("id");
		name=$("#prodname").val();
		qty=$("#prodqty").val();
		rate=$("#prodrate").val();
		$.post("addtocart.php", { pid:id, pname:name, pqty:qty, prate:rate }, function(data)
		{
			$("#ajaxloader").html(data);
		});
		$("#cart").load("refreshcart.php");
	});
	$(".notify").click(function()
	{
		id=$(this).attr("id");
		$.post("notifyme.php", {  pid:id }, function(data)
		{
			$("#ajaxloader").html(data);
		});
	});
	$(".simg").click(function()
	{
		src=$(this).attr("src");
		$(".mainimg").attr("src",src);
		size1="2px";
		size0="0px";
		$(".simg").attr("border",size0);
		$(this).attr("border",size1);
	});
	
});
</script>
<link rel="stylesheet" type="text/css" href="css/triponn.css"/>
</head>
<style>
#displaybox
{
	position:relative;	
	width:100%;
	top:250px;
	min-height:170%;
	left:0px;
}
img
{
	height:150px;
	width:150px;
}
.cont
{
	background-color:grey;
}
img.mainimg
{
	width:350px;
	height:300px;
	left:100px;
	position:relative;
}
img.simg
{
	width:150px;
	height:150px;
	position:relative;
}
#imgbox
{
	position:absolute;
	left:550px;
	top:450px;
}
#namenprice
{
	position:absolute;
	width:400px;
	min-height:380px;
	top:350px;
	left:150px;
}
#details
{
	position:relative;
	width:600px;
	min-height:250px;
	top:-350px;
	left:600px;
}
#feedback
{
	position:relative;
	background-color:grey;
	width:1050px;
	min-height:250px;
	top:550px;
	left:150px;
}
td,th
{	
}
.addcart
{
	width:150px;
	height:70px;
	background-color:green;
	border-radius:10px;
	color:white;
}
.notify
{
	width:370px;
	height:60px;
	background-color:grey;
	border-radius:10px;
	color:white;
}
#ajaxloader
{
	width:0px;
	height:0px;
}
#pkdetails
{
	position:absolute;
	top:680px;
	left:10px;
}
</style>
<body>
<div id="pageheader">
<h1 align="left">&nbsp;&nbsp;&nbsp;&nbsp;TRIPONN</h1>
<div id="topoptions">
<ul>
<li><a href="login.php" class="lognreg">Login</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</li>
<li><a href="register.php" class="lognreg">Register</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</li>
<li><a href="customerpannel.php" class="curruser" id="<?php echo $_SESSION["user"]; ?>"><?php echo $_SESSION["user"]; ?></a></li>
</ul>
</div>

<div id="line"></div>
</div>

<div id="displaybox">
<img class="mainimg" src="<?php echo $pic1; ?>"></br></br>
<div id="namenprice">
<?php 

		echo "<h2>Rs.".$rate."</h2>";
		$value=$rate;

?>
</br></br>
<?php
	echo "<div class='addcart' onclick='document.forms[\"form1\"].submit();'>";
	echo "<p style='position:absolute;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; HIRE CAR</p>";
	echo "<form name='form1' action='placeorder.php' method='POST'>";
	echo "<input type='hidden' name='name' value='".$id."'/>";
	echo "<input type='hidden' name='typ' value='".$type."'/>";
	echo "<input type='hidden' name='rate' value='".$value."'/>";
	echo "</form>";
	echo "</div>";
	
?>
</div>


<div id="details">
<h1><?php echo $cname; ?></h1></br>
<table width="100%" cellpadding="5px" cellspacing="5px">
<tr><th colspan="2"></th></tr>
<tr><td>Car Name</td><td><?php echo $cname; ?></td></tr>
<tr><td>Leased By</td><td><?php echo $lby; ?></td></tr>
<tr><td>Gear Type</td><td><?php echo $gear; ?></td></tr>
<tr><td>Passenger Quantity</td><td><?php echo $pqty; ?></td></tr>
<tr><td>Air conditioner</td><td><?php echo $ac; ?></td></tr>
<tr><td>Baggage</td><td><?php echo $bag; ?></td></tr>
</table>
</div>
<div id="pkdetails">
<h3><u>CAR HIRE ADDITIONAL DETAILS</u></h3>
<p><?php echo $ad ?></p>
</div>
</div>

<div id="pagefooter">
</div>
<div id="ajaxloader"></div>
</body>
</html>