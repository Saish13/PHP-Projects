<?php

	include "includes/config.php";
	
	
	$cid=$_SESSION["user"];
	$type=$_POST["typ"];
	$name=$_POST["name"];
	$totrate=$_POST["rate"];
	$nwdate=date("Y-m-d");
	$nwtime=date("h:i:s");
	
?>
<html>
<head>
<script language="javascript" src="scripts/jquery-1.10.2.min.js">
</script>
<script language="javascript" type="text/javascript">
</script>
<link rel="stylesheet" type="text/css" href="css/triponn.css"/>
</head>
<style>
#psb
{
	position:absolute;
	top:20px;
	left:10px;
}
img.content
{
	width:250px;
	height:200px;
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
<?php
	
	$query="select * from customer where c_id = '$cid'; ";
	$run=mysql_query($query);
	$data=mysql_fetch_array($run);
	echo "<h2>Customer Information</h2>";
	echo "<table width='40%'>";
	echo "<tr><td>Customer name</td><td>".$data['c_name']."</td></tr>";
	echo "<tr><td>Email</td><td>".$data['email']."</td></tr>";
	echo "<tr><td>Contact Number</td><td>".$data['cont_no']."</td></tr>";
	echo "<tr><td>Address</td><td>".$data['address']."</td></tr>";
	echo "</table>";	
?>

<h2>Name of Participants</h2>
<form method="POST" action="order.php">
<table width='50%'>
<tr><td>Name 1</td><td><input type="text" name="n1"/></td><td></td></tr>
<tr><td>Name 2</td><td><input type="text" name="n2"/></td><td></td></tr>
<tr><td>Name 3</td><td><input type="text" name="n3"/></td><td></td></tr>
<tr><td>Name 4</td><td><input type="text" name="n4"/></td><td></td></tr>
<tr><td>Name 5</td><td><input type="text" name="n5"/></td><td></td></tr>
<tr><td>Additional Names</td><td><textarea name="addn"></textarea></td><td></td></tr>
<input type='hidden' name='id' value='<?php echo $name;?>'/>
<input type='hidden' name='typ' value='<?php echo $type;?>'/>
<input type='hidden' name='rate' value='<?php echo $totrate;?>'/>
<tr><td></td><td><input type="submit" value="PROCEED TO PAY"></td><td></td></tr>
</table>
</form>
</div>

<div id="pagefooter">
</div>

</body>
</html>