<?php
	
	include "config.php";

	session_start();
	
	$preusr=$_SESSION['retailer'];
	
	$pid=$_POST["pid"];
	$pname=$_POST["pname"];
	$ptype=$_POST["ptype"];
	
	
	if ($pname > "" && $pid > "" && $ptype > "")
	{
		$flag=1;
		$query="select * from product where p_name = '$pname' and p_id = '$pid' and p_type = '$ptype' and r_id = '$preusr';";
	}
	elseif ($pname == "" && $pid > "" && $ptype > "")
	{
		$flag=2;
		$query="select * from product where p_id = '$pid' and p_type = '$ptype' and r_id = '$preusr';";
	}
	elseif ($pname == "" && $pid == "" && $ptype > "")
	{
		$flag=3;
		$query="select * from product where p_type = '$ptype' and r_id = '$preusr';";

	}
	elseif ($pname > "" && $pid == "" && $ptype == "")
	{
		$flag=4;
		$query="select * from product where p_name = '$pname' and r_id = '$preusr';";
	}
	elseif ($pname > "" && $pid == "" && $ptype > "")
	{
		$flag=5;
		$query="select * from product where p_name = '$pname' and p_type = '$ptype' and r_id = '$preusr';";		
	}
	elseif ($pname > "" && $pid > "" && $ptype == "")
	{
		$flag=6;
		$query="select * from product where p_name = '$pname' and p_id = '$pid' and r_id = '$preusr';";		
	}
	elseif ($pname == "" && $pid > "" && $ptype == "")
	{
		$flag=7;
		$query="select * from product where p_id = '$pid' and r_id = '$preusr';";		
	}
	else
	{
		$query="select * from product where r_id= '$preusr'";
	}
		
	
	$runq=mysql_query($query);
	$listcolor=1;
	while($rdata=mysql_fetch_array($runq))
	{	
		if($listcolor == 3)
		{
			$listcolor=1;
		}
		
		if ($listcolor==1)
		{
			$color="silver";
		}
		if ($listcolor==2)
		{
			$color="grey";
		}
		$image=$rdata['p_img1'];
		echo "<div id=".$rdata['p_id']." class=\"datalist\" style=\"background-color:$color\">";
		echo "<img src='$image'/>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rdata['p_id']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rdata['p_name'];
		echo "<div id='edata'>";
		echo "Present Quantity &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rdata['p_qty']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Present Discount &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rdata['p_discount']."</br>";
		echo "</br>";
		echo "Quantity <input type='text' id='q".$rdata["p_id"]."'/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Discount <input type='text' id='d".$rdata["p_id"]."'/>";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class=\"btn\" value=".$rdata['p_id']."> UPDATE </button> ";
		echo "</div>";
		echo "</div>";
		$listcolor++;
	}
?>
<html>
<head>
<script language="javascript" type="text/javascript" src="jquery-1.10.2.min.js">
</script>
<script type="text/javascript">
$(document).ready(function()
{
	$("button").click(function()
	{
		var cont=$(this).parent();
		var idcont=cont.parent();
		var mid=idcont.attr("id");
		var quantity=$("#q"+mid).val();
		var discount=$("#d"+mid).val();
		var pid=$(this).val();
		var color=$("#"+mid).css("background-color");
		$.post("updateinventory.php",{ prodid:pid, newqty:quantity, newdis:discount },function(data)
		{
			$("html").load(data);
			$.post("refreshinventory.php",{ id:mid,col:color },function(returndata){$("#"+mid).html(returndata)});
		});
	});
});
</script>
<style>
.datalist
{
	color:white;
	height:110px;
}
img
{
	width:100px;
	height:100px;
}
#edata
{
	position:relative;
	left:350px;
	top:-85px;

}
</style>
</head>
<body>
<div id="pp"></div>
</body>
</html>