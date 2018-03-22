<?php
	
	include "config.php";

	$type=$_POST["type"];
		
	if ($type=="Holiday Packages")
	{
		$flag=1;
		$query="select * from purchases where car_id = 0 and activity_id = 0;";
	}
	elseif ($type=="Activities")
	{
		$flag=2;
		$query="select * from purchases where package_id = 0 and car_id = 0;";
	}
	else
	{
		$flag=3;
		$query="select * from purchases where package_id = 0 and activity_id = 0;";
	}
	
	if($flag==1)
	{
		$runq=mysql_query($query);
		$listcolor=1;
		while($rdata=mysql_fetch_array($runq))
		{	
			if($rdata['package_id'] != "0")
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
				$query="select * from holidaypack where package_id = '".$rdata['package_id']."'";
				$runqu=mysql_query($query);
				$qdata=mysql_fetch_array($runqu);
				$image=$qdata['picture1'];
				echo "<div id=".$rdata['p_id']." class=\"datalist\" style=\"background-color:$color\">";
				echo "<img src='$image'/><div id='data'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rdata['p_id']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$qdata['package_name']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rdata['total_rate']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rdata['c_id']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				echo "<button class=\"btnp\" value=".$rdata['p_id']."> VIEW </button>";
				echo "</div></div>";
				$listcolor++;
			}
		}
	}
	if($flag==2)
	{
		$runq=mysql_query($query);
		$listcolor=1;
		while($rdata=mysql_fetch_array($runq))
		{
			if($rdata['activity_id'] != "0")
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
				$query="select * from holidayact where activity_id = '".$rdata['activity_id']."'";
				$runqu=mysql_query($query);
				$qdata=mysql_fetch_array($runqu);
				$image=$qdata['picture1'];
				echo "<div id=".$rdata['p_id']." class=\"datalist\" style=\"background-color:$color\">";
				echo "<img src='$image'/><div id='data'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rdata['p_id']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$qdata['activity_name']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rdata['total_rate']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rdata['c_id']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				echo "<button class=\"btna\" value=".$rdata['p_id']."> VIEW </button>";
				echo "</div></div>";
				$listcolor++;
			}
		}
	}
	if($flag==3)
	{
		$runq=mysql_query($query);
		$listcolor=1;
		while($rdata=mysql_fetch_array($runq))
		{	
			if($rdata['car_id'] != "0")
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
				$query="select * from carhire where car_id = '".$rdata['car_id']."'";
				$runqu=mysql_query($query);
				$qdata=mysql_fetch_array($runqu);
				$image=$qdata['picture1'];
				echo "<div id=".$rdata['p_id']." class=\"datalist\" style=\"background-color:$color\">";
				echo "<img src='$image'/><div id='data'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rdata['p_id']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$qdata["car_name"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rdata['total_rate']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rdata['c_id']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				echo "<button class=\"btnc\" value=".$rdata['p_id']."> VIEW </button>";
				echo "</div></div>";
				$listcolor++;
			}
		}
	}
?>
<html>
<head>
<script language="javascript" type="text/javascript" src="jquery-1.10.2.min.js">
</script>
<script type="text/javascript">
$(document).ready(function()
{
	$(".btnp").click(function()
	{
		var cont=$(this).parent();
		var id=(cont.attr("id"));
		vals=$(this).val();
		type="holidaypack";
		$.get("displaypack.php", { pid:vals , ptype:type} ,function(data){$("html").html(data);});
	});
	$(".btna").click(function()
	{
		var cont=$(this).parent();
		var id=(cont.attr("id"));
		var d=parseInt(id);
		vals=$(this).val();
		type="holidayact";
		$.get("displayact.php", { pid:vals , ptype:type} ,function(data){$("html").html(data);});
	});
	$(".btnc").click(function()
	{
		var cont=$(this).parent();
		var id=(cont.attr("id"));
		var d=parseInt(id);
		vals=$(this).val();
		type="carhire";
		$.get("displaycarhire.php", { pid:vals , ptype:type } ,function(data){$("html").html(data);});
	});
	return false;
});
</script>
<style>
.datalist
{
	color:white;
}
img
{
	position:relative;
	top:10px;
	width:120px;
	height:130px;
	left:20px;
}
#data
{
	position:relative;
	bottom:60px;
	left:150px;
}
</style>
</head>
<body>
<div id="pp"></div>
</body>
</html>