<?php 

	session_start();
	
	$preuser=$_SESSION["user"];
	if($preuser=="Guest User")
	{
		header('location:index.php');
	}
	else
	{
	
	}
?>
<html>
<head>
<script language="javascript" src="scripts/jquery-1.10.2.min.js">
</script>
<script language="javascript" type="text/javascript">
$(document).ready(function()
{
	$("#dispoptions").load("editmyprofile.php");
	$(".op").click(function()
	{
		link=$(this).attr("name");
		
		if(link=="edit")
		{
			$("#dispoptions").load("editmyprofile.php");
			$("#displaybox").css('minHeight','140%');
		}
		else if(link=="view") 
		{
			$("#dispoptions").load("viewmyorders.php");
			$("#displaybox").css('minHeight','180%');
		}
	});
});
</script>
<link rel="stylesheet" type="text/css" href="css/main.css"/>
<style>
#dispoptions
{

}
#sideoptions
{
	top:100px;
	position:absolute;
	width:250px;
	height:300px;
	left:50px;
}
#dispoptions
{
	position:absolute;
	width:900px;
	height:900px;
	left:320px;
	top:50px;
}
a
{
	text-decoration:none;
	color:#696758;
}
a:hover
{
	cursor:default;
}
#stline
{
	position:absolute;
	left:280px;
	width:1px;
	height:800px;
	top:30px;
	background-color:#696758;
}
</style>
</head>
<body>
<div id="pageheader">
<h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php">BUYITT!</a></h1>
<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The online shopping website</h4>
<div id="topoptions">
</div>
<div id="line1"></div>
</div>

<div id="searchbox">

</div>

<div id="displaybox">






<div id="sideoptions">
<ul>
<li><h3><u>OPTIONS</u></h3></li></br><br></br></br>
<hr></hr>
<li><a class="op" name="edit">EDIT PROFILE</a></li></br>
<hr></hr>
<li><a class="op" name="view">MY ORDERS</a></li></br>
<hr></hr>
</ul>
</div>
<div id="stline">
</div>
<div id="dispoptions">
</div>

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
echo "<li >&nbsp;&nbsp;&nbsp;&nbsp;<b style='color:white;'>|</b>&nbsp;&nbsp;&nbsp;&nbsp;<a class='footer' href='logout.php'>LOGOUT<a></li>"; }else{} ?>
</ul>
</div>

</body>
</html>