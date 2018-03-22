<html>
<head>
<style>
img
{
	width:22px;
	height:22px;
}
</style>
<script language="javascript" type="text/javascript" src="validation/regcar.js">
</script>
</head>
<body>
<form method="POST" action="recnewcarhire.php" enctype="multipart/form-data" name="regcar">
<table>
<tr><td>Car ID</td><td><input type="text" name="carid" onblur="val(1)"/></td><td><img src="validation/images/blank.png" id="carid"/></td></tr>
<tr><td>Car Name</td><td><input type="text" name="carname" onblur="val(2)"/></td><td><img src="validation/images/blank.png" id="carname"/></td></tr>
<tr><td>Passenger Quantity</td><td><input type="text" name="pq" onblur="val(3)"/></td><td><img src="validation/images/blank.png" id="pq"/></td></tr>
<tr><td>Air Conditioner</td><td><input type="text" name="ac" onblur="val(4)"/></td><td><img src="validation/images/blank.png" id="ac"/></td></tr>
<tr><td>Gear</td><td><input type="text" name="gear" onblur="val(5)"/></td><td><img src="validation/images/blank.png" id="gear"/></td></tr>
<tr><td>Baggage</td><td><input type="text" name="bagg" onblur="val(6)"/></td><td><img src="validation/images/blank.png" id="bagg"/></td></tr>
<tr><td>Leased By</td><td><input type="text" name="leasedby" onblur="val(7)"/></td><td><img src="validation/images/blank.png" id="leasedby"/></td></tr>
<tr><td>Rate</td><td><input type="text" name="rate" onblur="val(8)"/></td><td><img src="validation/images/blank.png" id="rate"/></td></tr>
<tr><td><label for="file">Car Image</label></td><td><input type="file" name="picture" id="f"/></td><td></td></tr>
<tr><td>Additional Details</td><td><textarea name="addet" onblur="val(9)"></textarea></td><td><img src="validation/images/blank.png" id="addet"/></td></tr>
<tr><td></td><td><input type="submit" value="SUBMIT"/></td><td></td></tr>
</table>
</form>
</body>
</html>