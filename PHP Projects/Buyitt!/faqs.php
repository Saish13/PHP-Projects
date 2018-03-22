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

<center><h1>FRQUENTLY ASKED QUESTIONS</h1></center>

<h2>Questions</h2>
<p><b>Q1.Where's my Order?</b></p>
<p>Ans:To check your order status, click on your profile name and then view My Orders.</p>

<p><b>Q2.Can I cancel an order after shipping?</b></p>
<P>Ans:Once your order is shipped from our warehouse, you will be able to cancel the order whenever you want. However, you can opt to return it to us after receiving it. We will refund the full amount.</P>

<P><b>Q3.What are the shipping charges on butitt products?</b></p>
<P>Ans:Buyitt offers free shipping within Goa on all products.</p>

<P><b>Q4.How do I check the status of my order?</b></p>
<P>Ans:You can check the status of your order at any time buy logging in your account and by clicking on my order.</p>

<P><b>Q5.How long does it take for an order to be delivered to me?</b></p>
<P>Ans:We deliver most of our orders within 3 days from the order date. </p>

<P><b>Q6.Does buyitt.com deliver products outside India?</b></p>
<P>Ans:No. At this point, Buyitt.com delivers products only within Goa</p>

<P><b>Q7.What is Buyitt.com's Return and Exchange Policy?</b></p>
<p>Ans:When you receive the product, you will be given a receipt which will contain the retailers contact info. You can contact the retailer for the exchange. </p>

<P><b>Q8.How long would it take me to receive the refund for my return?</b></p>
<P>Ans:Return of products depends on the retailer and how long the particular retailer takes to return the product.</p>

<P><b>Q9.Can I modify the shipping address of my order after it has been placed?</b></p>
<P>Ans:You can not modify the address of the the order once it has been placed. Although you can provide some other address than the primary address that has been provided by you while registering</p>

<P><b>Q10.How does the COD (Cash on Delivery) payment option work?</b></p>
<P>Ans:Cash on Delivery allows you to pay for your order with cash at the time of delivery. Buyitt.com offers a Cash on Delivery option for all orders and for most delivery addresses. </p>

<P><b>Q11.What are the benefits when I create an account?</b></p>
<P>Ans:When you create an account with Buyitt.com, you will be able to buy any products or ask for a notification if the product you want is out of stock</p>

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