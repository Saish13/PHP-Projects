<html>
<head>
<title>
</title>
</head>
<body>
<fieldset>
<legend><h2>Record for multiple days</h2></legend>
</br></br>
<form method="POST" name="onduty" action="reconduty.php">
<table>
<tr><td>Roll Number</td><td><input type="text" name="rn"/></td></tr>
<td>FROM</td><td><input type="date" name="fdate"/></td>
<td>TO</td><td><input type="date" name="tdate"/></td></tr>
<tr><td></td><td><input type="submit" value="SUBMIT"/></td></tr>
</table>
</form>
</fieldset>
</br></br></br>

<fieldset>
<legend><h2>Record for single days</h2></legend>
</br></br>
<form method="POST" name="onduty" action="recondutysingle.php">
<table>
<tr><td>Roll Number</td><td><input type="text" name="rn"/></td></tr>
<td>Date</td><td><input type="date" name="date"/></td>
<tr><td></td><td><input type="submit" value="SUBMIT"/></td></tr>
</table>
</form>
</fieldset>
</body>
</html>