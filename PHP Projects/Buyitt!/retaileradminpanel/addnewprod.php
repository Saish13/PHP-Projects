<?php



?>
<html>
<head>
<script language="javascript" type="text/javascript" src="validation/prodvald.js">
</script>
<style>
body
{
	color:white;
}
.vimg
{
	height:22px;
	weight:22px;
}

</style>
</head>
<body>
<form action="rec1.php" method="POST" name="prodform" enctype="multipart/form-data">
<table>
<tr><td>Product ID</td><td><input type="text" name="pid" onblur="vld(1)"/></td><td><img src="validation/images/blank.png" class="vimg" id="pid"/></td></tr>
<tr><td>Product Name</td><td><input type="text" name="pname" onblur="vld(2)"/></td><td><img src="validation/images/blank.png" class="vimg" id="pname"/></td></tr>
<tr><td>Product Type</td><td><input type="text" name="ptype" onblur="vld(3)"/></td><td><img src="validation/images/blank.png" class="vimg" id="ptype"/></td></tr>
<tr><td>Product Sub type</td><td><input type="text" name="psubtype" onblur="vld(4)"/></td><td><img src="validation/images/blank.png" class="vimg" id="psubtype"/></td></tr>
<tr><td>Product Quantity</td><td><input type="text" name="pqty" onblur="vld(5)"/></td><td><img src="validation/images/blank.png" class="vimg" id="pqty"/></td></tr>
<tr><td>Product Size</td><td><input type="text" name="psize" onblur="vld(6)"/></td><td><img src="validation/images/blank.png" class="vimg" id="psize"/></td></tr>
<tr><td>Product Color</td><td><input type="text" name="pcolor" onblur="vld(7)"/></td><td><img src="validation/images/blank.png" class="vimg" id="pcolor"/></td></tr>
<tr><td>Product Rate</td><td><input type="text" name="prate" onblur="vld(8)"/></td><td><img src="validation/images/blank.png" class="vimg" id="prate"/></td></tr>
<tr><td>Product Discount</td><td><input type="text" name="pdiscount" onblur="vld(9)"/></td><td><img src="validation/images/blank.png" class="vimg" id="pdiscount"/></td></tr>
<tr><td><label for="file">Product Image 1</label></td><td><input type="file" name="file1" id="f"/></td><td><img src="validation/images/blank.png" class="vimg" id="img1"/></td></tr>
<tr><td><label for="file">Product Image 2</label></td><td><input type="file" name="file2" id="f"/></td><td><img src="validation/images/blank.png" class="vimg" id="img2"/></td></tr>
<tr><td><label for="file">Product Image 3</label></td><td><input type="file" name="file3" id="f"/></td><td><img src="validation/images/blank.png" class="vimg" id="img3"/></td></tr>
<tr><td><label for="file">Product Image 4</label></td><td><input type="file" name="file4" id="f"/></td><td><img src="validation/images/blank.png" class="vimg" id="img4"/></td></tr>
<tr><td>Product Description</td><td><textarea name="pdesc" onblur="vld(10)"></textarea></td><td><img src="validation/images/blank.png" class="vimg" id="pdesc"/></td></tr>
<tr><td></td><td><input type="submit" value="submit"/></td><td></td></tr>
</form>
</table>
</form>
</body>
</html>
<!--
 p_id
 p_name
 p_type
 p_qty
 p_desc
 p_size
 p_color
 p_rate
 p_discount
 p_img1
 p_img2
 p_img3
 p_img4
 r_id
 -->