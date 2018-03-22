<?php

	include "config.php";

	session_start();
	$_SESSION["cart"]=array();
	
	$precus=$_SESSION["user"];
	$pid=$_GET["prod"];
	$query="select * from product where p_id = $pid;";
	$run=mysql_query($query);
	$rdata=mysql_fetch_array($run);
	$pimg1="retaileradminpanel/".$rdata["p_img1"];
	$pimg2="retaileradminpanel/".$rdata["p_img2"];
	$pimg3="retaileradminpanel/".$rdata["p_img3"];
	$pimg4="retaileradminpanel/".$rdata["p_img4"];
?>
<html>
<head>
<style>
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
</style>
</head>
<body>
<div id="imgbox">
<img class="mainimg" src="<?php echo $pimg1 ?>"></br></br>
<img class="simg" src="<?php echo $pimg2 ?>">
<img class="simg" src="<?php echo $pimg3 ?>">
<img class="simg" src="<?php echo $pimg4 ?>">
</div>
</body>
</html>