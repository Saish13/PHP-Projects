<?php

	include "config.php";
	
	session_start();
	
	$preusr=$_SESSION['retailer'];

	$_SESSION['searchfor']="2";

?>
<html>
<head>
<script type="text/javascript" src="jquery-1.10.2.min.js">
</script>
<script language="javascript" type="text/javascript">
$(document).ready(function(){
$("#send").click(function(){
temppname=$("#pname").val();
temppid=$("#pid").val();
tempptype=$("#ptype").val();
$.post("deletesearch.php",{ pname:temppname, pid:temppid, ptype:tempptype },function(ajaxresult){
$("#disp").html(ajaxresult);
});
});
});
</script>
</head>
<style>
#searchbox
{
	background-color:grey;
	width:850px;
	height:40px;
	position:absolute;
	top:10px;
	left:270px;
	border-radius:100px;
}
table
{
	position:absolute;
	left:20px;
}
td
{
	padding-top:5px;
}
#disp
{
	background-color:#FFFAFA;
	width:100%;
	height:100%;
	top:70px;
	position:absolute;
}
</style>
<body>
<div id="searchbox">
<form>
<table style="indent-left:5px;color:white;">
<tr><td>Search : </td><td>&nbsp;&nbsp;Product Name&nbsp;&nbsp;</td><td><input type="text" name="pname" id="pname"/></td><td>&nbsp;&nbsp;Product ID&nbsp;&nbsp;</td><td><input type="text" name="pid" id="pid"/></td><td>&nbsp;&nbsp;Product Type&nbsp;&nbsp;</td><td><select name="ptype" id="ptype">
<option>      </option>
<?php
	$query="select p_type from product where r_id = '$preusr' group by p_type;";
	echo $query;
	$runq=mysql_query($query);
	while($rdata=mysql_fetch_array($runq))
	{
		echo "<option>".$rdata['p_type']."</option>";
	}
?>
</select></td><td><input type="button" value="Search" id="send"></td></tr>
</table>
</form>
</div>
<div id="disp">
<div>
</body>
</html>