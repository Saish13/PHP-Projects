<?php
	
	include "config.php";

	$type=$_POST["type"];
		
	if ($type=="Holiday Packages")
	{
		$flag=1;
		$query="select * from holidaypack;";
	}
	elseif ($type=="Activities")
	{
		$flag=2;
		$query="select * from holidayact;";
	}
	else
	{
		$flag=3;
		$query="select * from carhire;";
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
				$image=$rdata['picture1'];
				echo "<div id=".$rdata['package_id']." class=\"datalist\" style=\"background-color:$color\">";
				echo "<img src='$image'/>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rdata['package_id']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rdata['package_name'];
				echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button class=\"btnp\" value=".$rdata['package_id']."> DELETE </button> ";
				echo "</div>";
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
				$image=$rdata['picture1'];
				echo "<div id=".$rdata['activity_id']." class=\"datalist\" style=\"background-color:$color\">";
				echo "<img src='$image'/>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rdata['activity_id']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rdata['activity_name'];
				echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button class=\"btna\" value=".$rdata['activity_id']."> DELETE </button> ";
				echo "</div>";
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
				$image=$rdata['picture1'];
				echo "<div id=".$rdata['car_id']." class=\"datalist\" style=\"background-color:$color\">";
				echo "<img src='$image'/>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rdata['car_id']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rdata['car_name'];
				echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button class=\"btnc\" value=".$rdata['car_id']."> DELETE </button> ";
				echo "</div>";
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
		$("#"+id).slideUp('slow');
		vals=$(this).val();
		type="holidaypack";
		$.post("deletecontent.php", { deleteid:vals , deletetype:type} ,function(data){$("html").load(data);});
	});
	$(".btna").click(function()
	{
		var cont=$(this).parent();
		var id=(cont.attr("id"));
		var d=parseInt(id);
		$("#"+id).slideUp('slow');
		vals=$(this).val();
		type="holidayact";
		$.post("deletecontent.php", { deleteid:vals , deletetype:type} ,function(data){$("html").load(data);});
	});
	$(".btnc").click(function()
	{
		var cont=$(this).parent();
		var id=(cont.attr("id"));
		var d=parseInt(id);
		$("#"+id).slideUp('slow');
		vals=$(this).val();
		type="carhire";
		$.post("deletecontent.php", { deleteid:vals , deletetype:type } ,function(data){$("html").html(data);});
	});
	return false;
});
</script>
<style>
.datalist
{
	color:blue;
}
img
{
	width:100px;
	height:100px;
}
</style>
</head>
<body>
<div id="pp"></div>
</body>
</html>