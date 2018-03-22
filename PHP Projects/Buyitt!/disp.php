<?php

	include "config.php";
	session_start();
	if(!isset($_SESSION["user"]))
	{
		$_SESSION["user"]="Guest User";
	}
	else
	{
		$user=$_SESSION["user"];
	}
	$_SESSION["last_url"]=$_SERVER["REQUEST_URI"];

	$precus=$_SESSION["user"];
	$pid=$_GET["prod"];
	$query="select *,r_compname from product,retailer where product.r_id=retailer.r_id and p_id = $pid;";
	$run=mysql_query($query);
	$rdata=mysql_fetch_array($run);
	$pimg1="retaileradminpanel/".$rdata["p_img1"];
	$pimg2="retaileradminpanel/".$rdata["p_img2"];
	$pimg3="retaileradminpanel/".$rdata["p_img3"];
	$pimg4="retaileradminpanel/".$rdata["p_img4"];
	$name=$rdata["p_name"];
	$type=$rdata["p_type"];
	$subtype=$rdata["p_subtype"];
	$qty=$rdata["p_qty"];
	$rate=$rdata["p_rate"];
	$dis=$rdata["p_discount"];
	$color=$rdata["p_color"];
	$size=$rdata["p_size"];
	$desc=$rdata["p_desc"];
	$comp=$rdata["r_compname"];
	$one=1;
	$zero=0;
	
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
<link rel="stylesheet" type="text/css" href="css/main.css"/>
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
}
img.simg
{
	width:80px;
	height:60px;
}
#imgbox
{
	position:absolute;
	left:150px;
	top:50px;
}
#namenprice
{
	position:absolute;
	width:400px;
	min-height:380px;
	top:50px;
	left:600px;
}
#details
{
	position:relative;
	width:600px;
	min-height:250px;
	top:500px;
	left:200px;
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
</style>
<body>
<div id="pageheader">
<h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php">BUYITT!</a></h1>
<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The online shopping website</h4>
<div id="topoptions">
<ul>
<li><a href="registeruser.php" class="lognreg">Login</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</li>
<li><a href="registeruser.php" class="lognreg">Register</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</li>
<li><a href="customerpannel.php" class="curruser" id="<?php echo $_SESSION["user"]; ?>"><?php echo $_SESSION["user"]; ?></a></li>
</ul>
</div>
<a class="cart" href="cart.php"><div id="cart">
<h3>CART &nbsp;&nbsp;&nbsp;&nbsp;
<?php if(isset($_SESSION["cart"])){echo count($_SESSION["cart"]);}else{echo "0";}; ?></h3>
</div></a>
<div id="line1"></div>
</div>
<div id="searchbox">
<form action="search.php" method="GET">
<table id="psb" cellpadding="5px">
<tr><td style="color:white" >SEARCH</td><td><select id="ty" name="ptype">
<?php
	$query="select p_type from product group by p_type;";
	$runq=mysql_query($query);
	echo "<option></option>";
	while($rdata=mysql_fetch_array($runq))
	{
		echo "<option>".$rdata["p_type"]."</option>";
	}
?>
</select></td><td><input type="text" id="search" name="pname" size="70"/></td><td><input type="submit" value="SEARCH"/></td></tr>
</table>
</form>
</div>
<div id="displaybox">
<div id="imgbox">
<img class="mainimg" src="<?php echo $pimg1; ?>"></br></br>
<img class="simg" src="<?php echo $pimg1; ?>">
<img class="simg" src="<?php echo $pimg2; ?>">
<img class="simg" src="<?php echo $pimg3; ?>">
<img class="simg" src="<?php echo $pimg4; ?>">
</div>
<div id="namenprice">
<h1><?php echo $name; ?></h1></br></br></br></br></br>
<?php 
	if($dis != 0)
	{
		echo "<h2><s>Rs. ".$rate."</s></h2>";
		echo "<h5>".$dis."%OFF</h5>";
		$disrate=$rate*$dis/100;
		$newrate=$rate-$disrate;
		echo "&#09;<h2 style=\"position:absolute;left:120px;top:180px;\">Rs. ".$newrate."</h2>";
	}
	else
	{
		echo "<h2>Rs.".$rate."</h2>";
	}
	if($qty > 0)
	{
		echo "<div>In stock</div>";
	}
	else
	{
		echo "<div style='color:red'>Out of stock</div>";
	}
?>
</br></br>
<?php
	if($qty == 0){$value1=$zero;}else{$value1=$one;}
	if($dis != 0){$value2=$newrate;}else{$value2=$rate;}
	if ($qty==0)
	{
		echo "<div class='notify' id='".$pid."'>";
		echo "<p style='position:absolute;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NOTIFY ME WHEN PRODUCT IS AVAILABLE</p>";
		echo "<input type='hidden' id='prodname' value='".$name."'/>";
		echo "</div>";
	}
	else
	{
		echo "<div class='addcart' id='".$pid."'>";
		echo "<p style='position:absolute;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ADD TO CART</p>";
		echo "<input type='hidden' id='prodname' value='".$name."'/>";
		echo "<input type='hidden' id='prodqty' value='".$value1."'/>";
		echo "<input type='hidden' id='prodrate' value='".$value2."'/>";
		echo "</div>";
	}
	
?>
</div>
<div id="details">
<table width="100%" cellpadding="5px" cellspacing="5px">
<tr><th colspan="2">Products Description</th></tr>
<tr><td>Product Name</td><td><?php echo $name; ?></td></tr>
<tr><td>Product Type</td><td><?php echo $type; ?></td></tr>
<tr><td>Product Sub-Type</td><td><?php echo $subtype; ?></td></tr>
<tr><td>Size</td><td><?php echo $size; ?></td></tr>
<tr><td>Color</td><td><?php echo $color; ?></td></tr>
<tr><td>Seller</td><td><?php echo $comp; ?></td></tr>
<tr><td>Product Description</td><td><?php echo $desc; ?></td></tr>
</table>
</div>

</div>
<div id="sidebox">
</div>
<div id="pagefooter">
<div id="line2"></div>
<ol class="one">
<li>HELP</li>
</br></br>
<li><a class="footer" href="">FAQ's</a></li></br>
<li><a class="footer" href="">Terms & Conditions</a></li></br>
<li><a class="footer" href="">Cancellations</a></li></br>
</ol>
<ol class="two">
<li>BUYITT!!!</li>
</br></br>
<li><a class="footer" href="">About Us</a></li></br>
<li><a class="footer" href="">Sell on Buyitt</a></li></br>
<li><a class="footer" href="">Contact us</a></li></br>
</ol>
<ul class="three">
<li><a class="footer" href="registerretailer.php">Register your business on Buyitt<a></li>
<?php if($_SESSION["user"]!="Guest User"){
echo "<li>&nbsp;&nbsp;&nbsp;&nbsp;<b>|</b>&nbsp;&nbsp;&nbsp;&nbsp;<a class='footer' href='logout.php'>LOGOUT<a></li>"; }else{} ?>
</ul>
</div>
<div id="ajaxloader"></div>
</body>
</html>