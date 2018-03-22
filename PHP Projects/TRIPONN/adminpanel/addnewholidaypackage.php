<html>
<head>
<style>
img
{
	width:22px;
	height:22px;
}
</style>
<script language="javascript" type="text/javascript" src="validation/regpack.js">
</script>
</head>
<body>
<form method="POST" action="recnewpackage.php" enctype="multipart/form-data" name="regpack">
<table>
<tr><td>Package ID</td><td><input type="text" name="packid" onblur="val(1)"/></td><td><img src="validation/images/blank.png" id="packid"/></td></tr>
<tr><td>Package Name</td><td><input type="text" name="packname" onblur="val(2)"/></td><td><img src="validation/images/blank.png" id="packname"/></td></tr>
<tr><td>Start date</td><td><input type="text" name="sd" onblur="val(3)"/></td><td><img src="validation/images/blank.png" id="sd"/></td></tr>
<tr><td>End date</td><td><input type="text" name="ed" onblur="val(4)"/></td><td><img src="validation/images/blank.png" id="ed"/></td></tr>
<tr><td>Number of children</td><td><input type="text" name="noc" onblur="val(5)"/></td><td><img src="validation/images/blank.png" id="noc"/></td></tr>
<tr><td>Number of Adults</td><td><input type="text" name="noa" onblur="val(6)"/></td><td><img src="validation/images/blank.png" id="noa"/></td></tr>
<tr><td>Country</td><td><input type="text" name="count" onblur="val(7)"/></td><td><img src="validation/images/blank.png" id="count"/></td></tr>
<tr><td>State</td><td><input type="text" name="state" onblur="val(8)"/></td><td><img src="validation/images/blank.png" id="state"/></td></tr>
<tr><td>Area</td><td><input type="text" name="area" onblur="val(9)"/></td><td><img src="validation/images/blank.png" id="area"/></td></tr>
<tr><td>Rate</td><td><input type="text" name="rate" onblur="val(10)"/></td><td><img src="validation/images/blank.png" id="rate"/></td></tr>
<tr><td>Discount</td><td><input type="text" name="dis" onblur="val(11)"/></td><td><img src="validation/images/blank.png" id="dis"/></td></tr>
<tr><td><label for="file">Package Image 1</label></td><td><input type="file" name="picture1" id="f"/></td><td></td></tr>
<tr><td><label for="file">Package Image 2</label></td><td><input type="file" name="picture2" id="f"/></td><td></td></tr>
<tr><td><label for="file">Package Image 3</label></td><td><input type="file" name="picture3" id="f"/></td><td></td></tr>
<tr><td><label for="file">Package Image 4</label></td><td><input type="file" name="picture4" id="f"/></td><td></td></tr>
<tr><td>Package Details</td><td><textarea name="pd" onblur="val(12)"></textarea></td><td><img src="validation/images/blank.png" id="pd"/></td></tr>
<tr><td></td><td><input type="submit" value="SUBMIT"/></td><td></td></tr>
</table>
</form>
</body>
</html>