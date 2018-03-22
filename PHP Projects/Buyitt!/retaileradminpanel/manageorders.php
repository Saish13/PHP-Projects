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
tempono=$("#ono").val();
tempstatus=$("#delstatus").val();
$.post("ordersearch.php",{ ono:tempono, status:tempstatus },function(ajaxresult){
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
<tr><td>Search : </td><td>&nbsp;&nbsp;ORDER NUMBER&nbsp;&nbsp;</td><td><input type="text" name="ono" id="ono"/></td><td>&nbsp;&nbsp;&nbsp;&nbsp;DELIVERY STATUS</td><td><select id="delstatus"><option></option><option>Approval</option><option>Dispatched</option><option>Delivered</option></select></td>
<td><input type="button" value="Search" id="send"></td></tr>
</table>
</form>
</div>
<div id="disp">
<div>
</body>
</html>