<?php

	include "config.php";
	session_start();
?>
<html>
<head>
<script language="javascript" src="scripts/jquery-1.10.2.min.js">
</script>
<script language="javascript" type="text/javascript">
</script>
</head>
<style>
body
{
	height:100%;
}
#pageheader
{
	position:absolute;
	width:100%;
	top:0px;
	height:150px;
	background-color:#F0F8FF;
	left:0px;
}
#pagefooter
{
	position:relative;
	width:100%;
	height:300px;
	background-color:silver;
	left:0px;
	bottom:-50%;
}
#searchbox
{
	position:absolute;
	background-color:#696969;
	width:100%;
	height:100px;
	left:0px;
	top:150px;
}
#displaybox
{
	position:relative;	
	width:100%;
	top:250px;
	min-height:110%;
	left:0px;
}
#topoptions
{
	position:absolute;
	right:30px;
	top:-10px;
}
#psb
{
	left:300px;
	position:relative;
	top:25px;
}
ul,li
{
	list-style-type:none;
	float:left;
}
a.curruser
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
	cursor:default;
}
td
{
	text-align:center;
}
#ajaxloader
{
	width:0px;
	height:0px;
}
</style>
<body>
<div id="pageheader">
<div id="topoptions">

</div>
</div>
<div id="displaybox">
<?php
	$query="select o_no from orders where time_stmp=(select max(time_stmp) from orders) group by o_no;";
	$run=mysql_query($query);
	$rdata=mysql_fetch_array($run);
	$rows=mysql_num_rows($run);
	$part1="OD";
	$part2=date("Ymd")."-";
	if($rows==0)
	{
		$part3="1";
		$order_id=$part1.$part2.$part3;
	}
	else
	{
		$oid=$rdata["o_no"];
		$num=explode("-",$oid);
		$intnum=intval($num[1]);
		$intnum=$intnum+1;
		$order_id=$part1.$part2.$intnum;
	}
	$li=count($_SESSION["cart"]);
	for ($i=0;$i<$li;$i++)
	{
		$order_id;
		$nwdate=date("Y-m-d");
		$nwtime=date("h:i:s");
		$total=$_SESSION["cart"][$i]["subtotal"];
		$edod=date("Y-m-d",strtotime(" +2days "));
		$delstatus="Approval";
		$qty=$_SESSION["cart"][$i]["quantity"];
		$add=$_POST["address"];
		$pid=$_SESSION["cart"][$i]["productid"];
		$cid=$_SESSION["user"];
		$timestmp=date("Y-m-d h:i:s");
		$query="insert into orders values('$order_id','$nwdate','$nwtime','$total','$edod','$delstatus','$qty','$add','$pid','$cid','$timestmp');";
		$run=mysql_query($query);
		
		$query="select * from product where p_id='$pid'";
		$run=mysql_query($query);
		$rdata=mysql_fetch_array($run);
		$preqty=$rdata["p_qty"];
		$retailer=$rdata["r_id"];
		$nqty=$preqty-$qty;
		if ($nqty<0)
		{
			$nqty=0;
		}
		$query="update product set p_qty='$nqty' where p_id='$pid' and r_id='$retailer'";
		$run=mysql_query($query);	
	}
	unset($_SESSION["cart"]);
	echo "<script language='javascript' type='text/javascript'>";
	echo "alert('YOUR ORDER HAS BEEN PLACED');";
	echo "window.location.href='index.php'";
	echo "</script>";
?>
</div>
YOUR ORDER NO <?php echo $order_id ?> HAS BEEN PLACED AND YOU WILL RECEIVE YOUR ITEMS ON THE <?php echo date("dS F Y",strtotime(" +2days ")); ?>
<div id="ajaxloader"></div>
</body>
</html>