<?php

	include "config.php";
	session_start();
	$preusr=$_SESSION["retailer"];
	$pid=$_POST["id"];
	$color=$_POST["col"];
	$query="select * from product where p_id = '$pid' and r_id = '$preusr';";
	$run=mysql_query($query);	
	$rdata=mysql_fetch_array($run);	
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

?>
<html>
<head>
<script language="javascript" src="jquery-1.10.2.min.js">
</script>
<script language="javascript" type="text/javascript">
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
</head>
<body>
</body>
</html>