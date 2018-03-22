<?php

	include "config.php";
	session_start();
	
	
?>
<html>
<head>
<script language="javascript" src="scripts/jquery-1.10.2.min.js">
</script>
<script language="javascript" type="text/javascript">
$(document).ready(function()
{
	$("button").click(function()
	{
		cont=$(this).parent();
		id=cont.attr("id");
		gfcont=cont.parent();
		var suid=gfcont.attr("id");
		$("#"+suid).slideUp('slow');
		$.post("deletecart.php", { pid:id }, function(data)
		{
			$("html").load(data);
		});
		$("#cart").load("refreshcart.php");
	});
	$("input").blur(function()
	{
		val=$(this).val();
		div=$(this).parent();
		divid=div.attr("id");
		if(divid=="")
		{
			divid=0;
		}
		$.post("updatecart.php", { nqty:val, pid:divid}, function(data)
		{
			$("#ajaxloader").html(data);
		});
	});
});
</script>
<link rel="stylesheet" type="text/css" href="css/main.css"/>
</head>
<style>
ul,li
{
	list-style-type:none;
	float:left;
}
a.curruser,a.rmvu
{
	text-decoration:none;
}
img
{
	height:150px;
	width:150px;
}
.cont
{
	background-color:grey;
	position:relative;
}
#cart
{
	position:absolute;
	right:30px;
	width:200px;
	height:80px;
	background-color:grey;
	top:50px;
	border-radius:10px;
	color:white;
	text-indent:40px;
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
	background-color:grey;
	border-radius:10px;
	color:white;
}
div.cont
{
	background-color:grey;
}
#placeorder
{
	position:absolute;
	left:500px;
	background-color:green;
	color:white;
	width:200px;
	height:50px;
	border-radius:10px;
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
<div id="cart">
<h3>CART &nbsp;&nbsp;&nbsp;&nbsp;
<?php if(isset($_SESSION["cart"])){echo count($_SESSION["cart"]);}else{echo "0";}; ?></h3>
</div>
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
<?php

	if(isset($_SESSION["cart"]))
	{
		$num=0;
		$li=count($_SESSION["cart"]);
		if (is_array($_SESSION["cart"]))
		{
			for($i=0;$i<$li;$i++)
			{
				$query="select * from product where p_id =".$_SESSION["cart"][$i]["productid"];
				$run=mysql_query($query);
				$rdata=mysql_fetch_array($run);
				$img=$rdata["p_img1"];
				echo "<div id='main".$_SESSION["cart"][$i]["productid"]."' class='cont'>";
				echo "<img src='retaileradminpanel/$img'/>";
				echo "<div id=".$_SESSION["cart"][$i]["productid"]." style='position:absolute;top:5px;left:220px;'>";
				echo "<h2>".$_SESSION["cart"][$i]["productname"]."</h2></br>";
				echo "Quantity <input type='text' id='qty".$i."' size='2px' name='quty' value='".$_SESSION["cart"][$i]["quantity"]."'/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;X&nbsp;&nbsp;";
				echo "Rs. ".$_SESSION["cart"][$i]["rate"];
				echo "</div>";
				echo "<div id=".$_SESSION["cart"][$i]["productid"]." style='position:absolute;right:200px;top:50px;'>";
				echo "<button id='delcart'>DELETE</button>";
				echo "</div>";
				echo "</div>";
				echo "</br>";
			}
			echo "<a class='rmvu' href='placeorder.php'/><div id='placeorder' value='$li'>";
			echo "<p style='position:absolute;top:-3px;left:45px;'>PLACE ORDER</p>";
			echo "</div></a>";
		
		}
	}
?>
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