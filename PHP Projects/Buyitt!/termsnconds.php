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


<CENTER><h1><u>TERMS AND CONDITIONS</u></h1></CENTER>
</br></br>
<p><strong>Please read the following terms and conditions very carefully as your use of service is subject to your acceptance of and compliance with the following terms and conditions  (&quot;Terms&quot;).</strong></p>

<p>By subscribing to or using any of our services you agree that you have read, understood and are bound by the Terms, regardless of how you subscribe to or use the services. 



<p><strong>1. Introduction:</strong></p>
<p>a) <a href="index.php" style="color:blue;">www.buyitt.com</a> (&quot;Website&quot;) is an Internet based content and e-commerce portal.</p>
<p>b) Use of the Website is offered to you conditioned on acceptance without modification of all the terms, conditions and notices contained in these Terms, as may be posted on the Website from time to time. buyitt.com at its sole discretion reserves the right not to accept a User from registering on the Website without assigning any reason thereof.</p>

<p><strong>2. User Account, Password, and Security:</strong></p>
<p>You will receive a password and account designation upon completing the Website's registration process. You are responsible for maintaining the confidentiality of the password and account, and are fully responsible for all activities that occur under your password or account. </p>

<p><strong>3. Services Offered:</strong></p>
<p>Buyitt.com provides a number of Internet-based services through the Web Site (all such services, collectively, the "Service"). One such service enables users to purchase original merchandise such as clothing, footwear and accessories from various fashion and lifestyle brands (collectively, "Products"). The Products can be purchased through the Website through various methods of payments offered. The sale/purchase of Products shall be additionally governed by specific policies of sale, like cancellation policy, return policy, etc. </p>

<p><strong>4. Limited User:</strong></p>
<p>The User agrees and undertakes not to reverse engineer, modify, copy, distribute, transmit, display, perform, reproduce, publish, license, create derivative works from, transfer, or sell any information or software obtained from the Website. Limited reproduction and copying of the content of the Website is permitted provided that buyitt's name is stated as the source and prior written permission of buyitt.com is sought. For the removal of doubt, it is clarified that unlimited or wholesale reproduction, copying of the content for commercial or non-commercial purposes and unwarranted modification of data and information within the content of the Website is not permitted.</p>

<p><strong>5. User Conduct and Rules:</strong></p>
<p>You agree and undertake to use the Website and the Service only to post and upload messages and material that are proper. By way of example, and not as a limitation, you agree and undertake that when using a Service, you will not:</p>

<p>(a)&nbsp;&nbsp;defame, abuse, harass, stalk, threaten or otherwise violate the legal rights of others;</p>

<p>(b)&nbsp;&nbsp;publish, post, upload, distribute or disseminate any inappropriate, profane, defamatory, infringing, obscene, indecent or unlawful topic, name, material or information;</p>

<p>(c)&nbsp;&nbsp;upload or distribute files that contain viruses, corrupted files, or any other similar software or programs that may damage the operation of the Website or another's computer;</p>

<p>(d)&nbsp;&nbsp;violate, abuse, unethically manipulate or exploit, any of the terms and conditions of this Agreement or any other terms and conditions for the use of the Website contained elsewhere.</p>

<p><strong>6. Pricing:</strong></p>
<p>Prices for products are described on our Website and are incorporated into these Terms by reference. All prices are in Indian rupees. Prices, products and Services may change at buyitt's discretion.</p>

<p><strong>7. Shipping:</strong></p>
<p>Title and risk of loss for all products ordered by you shall pass on to you upon buyitt's shipment to the shipping carrier.</p>

<p><strong>8. Severability:</strong></p>
<p>If any provision of the Terms is determined to be invalid or unenforceable in whole or in part, such invalidity or unenforceability shall attach only to such provision or part of such provision and the remaining part of such provision and all other provisions of these Terms shall continue to be in full force and effect.</p>

<p><strong>9. Report Abuse:</strong></p>
<p>As per these Terms, users are solely responsible for every material or content uploaded on to the Website. Users can be held legally liable for their contents and may be held legally accountable if their contents or material include, for example, defamatory comments or material protected by copyright, trademark, etc.</p>
			

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
</body>
</html>