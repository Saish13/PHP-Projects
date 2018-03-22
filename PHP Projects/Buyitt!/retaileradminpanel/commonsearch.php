<?php
	
	include "config.php";

	session_start();
	
	$preusr=$_SESSION['retailer'];
	
	$pid=$_POST["pid"];
	$pname=$_POST["pname"];
	$ptype=$_POST["ptype"];
	
	$currsearch=$SESSION['searchfor'];
	echo $currsearch;
	
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
		$flag=0;
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
		echo "<div id=\"datalist\" style=\"background-color:$color\">";
		echo "<img src='$image'/>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rdata['p_id']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rdata['p_name'];
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"button\" id=\"one\" class=\"edit\" name=".$rdata['p_id']." value=\"EDIT\"/> ";
		echo $currsearch;
		echo "</div";
		echo "</br>";
		$listcolor++;
	}
	
?>
<html>
<head>
<script language="javascript" type="text/javascript" src="jquery-1.10.2.min.js">
</script>
<script type="text/javascript">
$(document).ready(function(){
$(".edit").click(function(){
cpid=$(this).name;
$.post("editsingleprod.php",{ pid:cpid } , function(ajaxresult){
$("#pp").html(ajaxresult);
});
});
});
</script>
<style>
#datalist
{
	color:white;
	position:relative;
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