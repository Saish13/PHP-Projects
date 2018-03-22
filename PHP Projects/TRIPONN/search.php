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
	$_SESSION["last_url"]=$_SERVER["REQUEST_URI"];

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

<div id="searchbox">
<form action="search.php" method="GET">
<table id="psb" cellpadding="5px">
<tr>
<td>Type</td>
<td><select name="type">
<option></option>
<option>Holiday Packages</option>
<option>Activities</option>
<option>Car hire</option>
</select></td>
<td>To</td>
<td><input type="text" id="search" name="name" value="" size="50"/></td><td><input type="submit" value="SEARCH"/></td></tr>
</table>
</form>
</div>

<div id="displaybox">
<?php

	$name=$_GET["name"];
	$type=$_GET["type"];
	if ($type=="Holiday Packages")
	{
		$ty="holidaypack";
		$filler="package";
		$fill2="package_name";
	}
	else if ($type=="Activities")
	{
		$ty="holidayact";
		$filler="activity";
		$fill2="activity_name";
	}
	else
	{
		$ty="carhire";
		$filler="carhire";
		$fill2="car_name";
	}

	if($name > "" && $type > "")
	{
		$qury="select * from $ty where country like '%$name%' or area like '%$name%' or state like '%$name%' or $fill2 like '%$name%';";
		$flag=1;
		if($ty=="carhire")
		{
			$qury="select * from $ty where $fill2 like '%$name%';";
		}
	}
	else if($name > "" && $type == "")
	{
		$qury="select * from holidaypack where country like '%$name%' or area like '%$name%' or state like '%$name%' or activity_name like '%$name%' ;";
		$flag=2;
	}
	else if($name == "" && $type > "")
	{
		$qury="select * from $ty;";
		$flag=3;
	}
	else
	{
		echo "COULD NOT FIND.";
		$qury="select * from purchases where p_id = '0';";
	}
	$srun=mysql_query($qury);
	$sdata=mysql_fetch_array($srun);
	$run=mysql_query($qury);
	echo "<table  class='data' cellspacing='10px' width='100%'>";
	while($rdata=mysql_fetch_array($run))
	{
		if($flag==1)
		{
			if($filler=="package")
			{
				if($rdata["package_id"]!="0")
				{	
					$image=$rdata['picture1'];
					echo "<div class='cont' id='".$rdata['package_id']."' onclick='document.forms[\"form".$rdata['package_id']."\"].submit();'>";
					echo "<tr>";
					echo "<form name='form".$rdata['package_id']."' action='assign.php' method='GET'>";
					echo "<input type='hidden' name='prod' value='".$rdata['package_id']."'/>";	
					echo "<input type='hidden' name='tt' value='holidaypack'/>";	
					if($rdata['discount']==0)
					{
						echo "<td><img class='content' src='adminpanel/$image'/></br></td><td>".$rdata['package_name']."</br></td><td>".$rdata['rate']."  Rs.</br></td>";
					}
					else
					{
						echo "<td><img class='content' src='adminpanel/$image'/></br></td><td>".$rdata['package_name']."</br></td><td>".$rdata['rate']."  Rs.</br>".$rdata['discount']."% Discount</td>";	
					}
					echo "</form>";
					echo "</tr>";	
					echo "</div>";
				}
			}
			if($filler=="activity")
			{
				if($rdata["activity_id"]!="0")
				{	
					echo "<tr>";
					$image=$rdata['picture1'];
					echo "<td>";
					echo "<div class='cont' id='".$rdata['activity_id']."' onclick='document.forms[\"form".$rdata['activity_id']."\"].submit();'>";
					echo "<form name='form".$rdata['activity_id']."' action='assign.php' method='GET'>";
					echo "<input type='hidden' name='prod' value='".$rdata['activity_id']."'/>";
					echo "<input type='hidden' name='tt' value='holidayact'/>";
					if($rdata['discount']==0)
					{
						echo "<img class='content' src='adminpanel/$image'/></br></td><td>".$rdata['activity_name']."</br></td><td>".$rdata['rate']."  Rs.</br>";
					}
					else
					{
						echo "<img class='content' src='adminpanel/$image'/></br></td><td>".$rdata['activity_name']."</br></td><td>".$rdata['rate']."  Rs.</br>".$rdata['discount']."% Discount";	
					}
					echo "</form>";
					echo "</td>";			
					echo "</div>";
					echo "</tr>";	
				}				
			}
			if($filler=="carhire")
			{
				if($rdata["car_id"]!="0")
				{	
					echo "<tr>";
					$image=$rdata['picture1'];
					echo "<td>";
					echo "<div class='cont' id='".$rdata['car_id']."' onclick='document.forms[\"form".$rdata['car_id']."\"].submit();'>";
					echo "<form name='form".$rdata['car_id']."' action='assign.php' method='GET'>";
					echo "<input type='hidden' name='prod' value='".$rdata['car_id']."'/>";
					echo "<input type='hidden' name='tt' value='carhire'/>";
					
					echo "<img class='content' src='adminpanel/$image'/></br></td><td>".$rdata['car_name']."</br></td><td>".$rdata['rate']."  Rs.</br>";
					
					echo "</form>";
					echo "</td>";			
					echo "</div>";
					echo "</tr>";	
				}				
			}				
		}
	
		if($flag==2)
		{
			if($rdata["package_id"]!="0")
			{	
				echo "<tr>";
				$image=$rdata['picture1'];
				echo "<td>";
				echo "<div class='cont' id='".$rdata['package_id']."' onclick='document.forms[\"form".$rdata['package_id']."\"].submit();'>";
				echo "<form name='form".$rdata['package_id']."' action='assign.php' method='GET'>";
				echo "<input type='hidden' name='prod' value='".$rdata['package_id']."'/>";
				echo "<input type='hidden' name='tt' value='holidaypack'/>";
				if($rdata['discount']==0)
				{
					echo "<img class='content' src='adminpanel/$image'/></br></td><td>".$rdata['package_name']."</br></td><td>".$rdata['rate']."  Rs.</br>";
				}
				else
				{
					echo "<img class='content' src='adminpanel/$image'/></br></td><td>".$rdata['package_name']."</br></td><td>".$rdata['rate']."  Rs.</br>".$rdata['discount']."% Discount";	
				}
				echo "</form>";
				echo "</td>";			
				echo "</div>";
				echo "</tr>";
			}			
		}
		
		if($flag==3)
		{	
			if($filler=="package")
			{
				if($rdata["package_id"]!="0")
				{
					echo "<tr>";
					$image=$rdata['picture1'];
					echo "<td>";
					echo "<div class='cont' id='".$rdata['package_id']."' onclick='document.forms[\"form".$rdata['package_id']."\"].submit();'>";
					echo "<form name='form".$rdata['package_id']."' action='assign.php' method='GET'>";
					echo "<input type='hidden' name='prod' value='".$rdata['package_id']."'/>";
					echo "<input type='hidden' name='tt' value='holidaypack'/>";
					if($rdata['discount']==0)
					{
						echo "<img class='content' src='adminpanel/$image'/></br></td><td>".$rdata['package_name']."</br></td><td>".$rdata['rate']."  Rs.</br>";
					}
					else
					{
						echo "<img class='content' src='adminpanel/$image'/></br></td><td>".$rdata['package_name']."</br></td><td>".$rdata['rate']."  Rs.</br>".$rdata['discount']."% Discount";	
					}
					echo "</form>";
					echo "</td>";			
					echo "</div>";
					echo "</tr>";		
				}
			}
			if($filler=="activity")
			{
				if($rdata["activity_id"]!="0")
				{
					echo "<tr>";
					$image=$rdata['picture1'];
					echo "<td>";
					echo "<div class='cont' id='".$rdata['activity_id']."' onclick='document.forms[\"form".$rdata['activity_id']."\"].submit();'>";
					echo "<form name='form".$rdata['activity_id']."' action='assign.php' method='GET'>";
					echo "<input type='hidden' name='prod' value='".$rdata['activity_id']."'/>";
					echo "<input type='hidden' name='tt' value='holidayact'/>";
					if($rdata['discount']==0)
					{
						echo "<img class='content' src='adminpanel/$image'/></br></td><td>".$rdata['activity_name']."</br></td><td>".$rdata['rate']."  Rs.</br>";
					}
					else
					{
						echo "<img class='content' src='adminpanel/$image'/></br></td><td>".$rdata['activity_name']."</br></td><td>".$rdata['rate']."  Rs.</br>".$rdata['discount']."% Discount";	
					}
					echo "</form>";
					echo "</td>";			
					echo "</div>";
					echo "</tr>";		
				}
			}
			if($filler=="carhire")
			{
				if($rdata["car_id"]!="0")
				{
					echo "<tr>";
					$image=$rdata['picture1'];
					echo "<td>";
					echo "<div class='cont' id='".$rdata['car_id']."' onclick='document.forms[\"form".$rdata['car_id']."\"].submit();'>";
					echo "<form name='form".$rdata['car_id']."' action='assign.php' method='GET'>";
					echo "<input type='hidden' name='prod' value='".$rdata['car_id']."'/>";
					echo "<input type='hidden' name='tt' value='carhire'/>";
					echo "<img class='content' src='adminpanel/$image'/></br></td><td>".$rdata['car_name']."</br></td><td>".$rdata['rate']."  Rs.</br>";
					
					echo "</form>";
					echo "</div>";
					echo "</td>";			
					echo "</tr>";			
				
				}
			}
		}
	}
	echo "</table>";
	$name="";
	$type="";
?>
</div>

<div id="pagefooter">

</div>

</body>
</html>