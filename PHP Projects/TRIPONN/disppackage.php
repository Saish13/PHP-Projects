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
	$query="select * from $type where package_id = '$id';";
	$run=mysql_query($query);
	$data=mysql_fetch_array($run);
	$pname=$data["package_name"];
	$startd=$data["start_d"];
	$endd=$data["end_d"];
	$noa=$data["noa"];
	$noc=$data["noc"];
	$pd=$data["package_detail"];
	$country=$data["country"];
	$state=$data["state"];
	$area=$data["area"];
	$rate=$data["rate"];
	$dis=$data["discount"];
	$pic1="adminpanel/".$data["picture1"];
	$pic2="adminpanel/".$data["picture2"];
	$pic3="adminpanel/".$data["picture3"];
	$pic4="adminpanel/".$data["picture4"];
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
	if($dis != 0)
	{
		echo "<h2><s>Rs. ".$rate."</s></h2>";
		echo "<h5>".$dis."%OFF</h5>";
		$disrate=$rate*$dis/100;
		$newrate=$rate-$disrate;
		echo "&#09;<h2 style=\"position:absolute;left:120px;top:-2px;\">Rs. ".$newrate."</h2>";
		$value=$newrate;
	}
	else
	{
		echo "<h2>Rs.".$rate."</h2>";
		$value=$rate;
	}
?>
</br></br>
<?php

	echo "<div class='addcart' onclick='document.forms[\"form1\"].submit();'>";
	echo "<p style='position:absolute;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BUY PACKAGE</p>";
	echo "<form name='form1' action='placeorder.php' method='POST'>";
	echo "<input type='hidden' name='name' value='".$id."'/>";
	echo "<input type='hidden' name='typ' value='".$type."'/>";
	echo "<input type='hidden' name='rate' value='".$value."'/>";
	echo "</form>";
	echo "</div>";
	
?>
</div>
<div id="imgbox">
<img class="simg" src="<?php echo $pic1; ?>">
<img class="simg" src="<?php echo $pic2; ?>">
<img class="simg" src="<?php echo $pic3; ?>">
<img class="simg" src="<?php echo $pic4; ?>">
</div>

<div id="details">
<h1><?php echo $pname; ?></h1></br>
<table width="100%" cellpadding="5px" cellspacing="5px">
<tr><th colspan="2"></th></tr>
<tr><td>Package Name</td><td><?php echo $pname; ?></td></tr>
<tr><td>Start Date</td><td><?php echo $startd; ?></td></tr>
<tr><td>End Date</td><td><?php echo $endd; ?></td></tr>
<tr><td>Number of children</td><td><?php echo $noc; ?></td></tr>
<tr><td>Number of adults</td><td><?php echo $noa; ?></td></tr>
<tr><td>Country</td><td><?php echo $country; ?></td></tr>
<tr><td>State</td><td><?php echo $state; ?></td></tr>
<tr><td>Area</td><td><?php echo $area; ?></td></tr>
</table>
</div>
<div id="pkdetails">
<h3><u>PACKAGE ADDITIONAL DETAILS</u></h3>
<p><?php echo $pd ?></p>
</div>
</div>

<div id="pagefooter">
</div>
<div id="ajaxloader"></div>
</body>
</html>