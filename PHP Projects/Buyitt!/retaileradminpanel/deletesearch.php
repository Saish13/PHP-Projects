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
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button class=\"btn\" value=".$rdata['p_id']."> DELETE </button> ";
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
	
	$(".btn").click(function()
	{
		var cont=$(this).parent();
		var id=(cont.attr("id"));
		var d=parseInt(id);
		
		$("#"+d).slideUp('slow');
		vals=$(this).val();
		$.post("delete.php", { deleteid:vals } ,function(data){$("html").load(data);});
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