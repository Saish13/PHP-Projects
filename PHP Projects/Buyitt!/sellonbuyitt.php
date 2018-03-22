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

?>
<html>
<head>
<script language="javascript" src="scripts/jquery-1.10.2.min.js">
</script>
<script language="javascript" type="text/javascript">
</script>
<link rel="stylesheet" type="text/css" href="css/main.css"/>
</head>

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
<tr><td style="color:white" >SEARCH</td><td><select id="select" name="ptype">
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


<div id="header"><h1 align="center"><u>BUYITT !!!</u></h1>
<p id="tag" align="center">An exciting place for the whole family to shop.</p>
</div>
<div id="bg">
<h2>Sell on Buyitt</h2>
<h3>Benefits of Sell on Buyitt</h3>
<p class="para">Selling on Buyitt provides businesses of all sizes a compelling sales channel with a nationwide reach. 
You can list an unlimited number of products and benefit from Buyitt's investment in technology and innovation,
 traffic, convenient shopping experience, and a secure payment infrastructure backed by Buyitt's comprehensive 
 A-to-Z guarantee. Additionally, you will have access to Buyitt's proven seller coaching tools and a suite of 
 integrated services that can help you easily grow your business online.</p>
<p class="para">Listing on Buyitt.com is free. In celebration of the launch of Buyitt.com, you can enjoy a promotional referral 
fee and free monthly subscription for the first year.</p>
<p class="para">You also have the ability to enable Fulfilment by Buyitt (FBB) so that you can put Buyitt's world class fulfilment
 technology to work for you. With the trusted Buyitt platform and fulfilment services, you will have access to the
 resources that you need to build your business.</p>
<p class="para">High quality images and content provide better customer experience that in turn, is known to directly impact chances
 of incremental sales. Buyitt's service Provider Network can help you prepare high-quality, high-impact listings for
 your Buyitt business.</p>
<p class="para">Benefits at a glance:</p>
<ul>
<li>Open a new sales channel and reach nationwide potential customers</li>
<li>Convenient shopping experience for customers</li>
<li>Benefit from Buyitt's investment in technology and innovation</li>
<li>No product listing fees</li>
<li>No upfront costs of creating a website or setting up a physical store</li>
<li>Secure payments</li>
</ul>
<h3>How it works</h3>
<h4>Step 1 List Your Products on Buyitt.com</h4>
<p class="para">With Selling on Buyitt.com, it's easy to list your products. Once you've registered to start selling online use the Web-based tools,
 a free desktop software application, or text files to start selling quickly.</p>
<h4>Step 2 Customers See Your Products on Buyitt.com</h4>
<p class="para">Once you list your products on Buyitt.com, potential customers across India can see your products.</p>
<h4>Step 3 Customers Buy Your Products</h4>
<p class="para">Buyitt makes buying your product easy. With trustworthy shopping experience and secure payment infrastructure, we help customers make 
quick, easy, and worry-free purchases.</p>
<h4>Step 4 You Deliver Products to Customers</h4>
<p class="para">Buyitt notifies you by e-mail when an order has been placed. You simply pack and deliver your item to the customer 
(unless you let Fulfilment by Buyitt do the work).</p>
<h4>Step 5 You Receive Payment from Buyitt</h4>
<p class="para">Payment for the order is deposited into your bank account after the deduction of Buyitt's fee and you receive notification
 by email that your payment has been sent.</p>
<p class="para"></p>
</div>
<div id="footer">
</div>



</div>
<div id="sidebox">
</div>
<div id="pagefooter">
<div id="line2"></div>
<ol class="one">
<li>HELP</li>
</br></br>
<li><a class="footer" href="faqs.php">FAQ's</a></li></br>
<li><a class="footer" href="termsnconds.php">Terms & Conditions</a></li></br>
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
</body>
</html>