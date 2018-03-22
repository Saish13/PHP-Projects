<html>
<head>
<style>
img
{
	width:22px;
	height:22px;
}
</style>
<script language="javascript" type="text/javascript" src="validation/regact.js">
</script>
</head>
<body>
<form method="POST" action="recnewactivity.php" enctype="multipart/form-data" name="regact">
<table>
<tr><td>Activity ID</td><td><input type="text" name="actid" onblur="val(1)"/></td><td><img src="validation/images/blank.png" id="actid"/></td></tr>
<tr><td>Activity Name</td><td><input type="text" name="actname" onblur="val(2)"/></td><td><img src="validation/images/blank.png" id="actname"/></td></tr>
<tr><td>Activity date</td><td><input type="text" name="actdate" onblur="val(3)"/></td><td><img src="validation/images/blank.png" id="actdate"/></td></tr>
<tr><td>Country</td><td><input type="text" name="count" onblur="val(4)"/></td><td><img src="validation/images/blank.png" id="count"/></td></tr>
<tr><td>State</td><td><input type="text" name="state" onblur="val(5)"/></td><td><img src="validation/images/blank.png" id="state"/></td></tr>
<tr><td>Area</td><td><input type="text" name="area" onblur="val(6)"/></td><td><img src="validation/images/blank.png" id="area"/></td></tr>
<tr><td>Rate</td><td><input type="text" name="rate" onblur="val(7)"/></td><td><img src="validation/images/blank.png" id="rate"/></td></tr>
<tr><td>Discount</td><td><input type="text" name="dis" onblur="val(8)"/></td><td><img src="validation/images/blank.png" id="dis"/></td></tr>
<tr><td><label for="file">Activity Image 1</label></td><td><input type="file" name="picture1" id="f"/></td><td></td></tr>
<tr><td><label for="file">Activity Image 2</label></td><td><input type="file" name="picture2" id="f"/></td><td></td></tr>
<tr><td><label for="file">Activity Image 3</label></td><td><input type="file" name="picture3" id="f"/></td><td></td></tr>
<tr><td>Activity Details</td><td><textarea name="ad" onblur="val(9)"></textarea></td><td><img src="validation/images/blank.png" id="ad"/></td></tr>
<tr><td>Terms and Conditions</td><td><textarea name="tnc" onblur="val(10)"></textarea></td><td><img src="validation/images/blank.png" id="tnc"/></td></tr>
<tr><td></td><td><input type="submit" value="SUBMIT"/></td><td></td></tr>
</table>
</form>
</body>
</html>