<html>
<body>
<form action="login.php" method="POST">
<p><input type="text" name="username" placeholder="Username">
<p><input type="password" name="password" placeholder="Password">
<p><input type="submit" name="login" placeholder="Log In">
</form>
<p><a href="register.php">Register</a>
<p><a href="forgot.php">Forgot Password or Username?</a>
<?php
if(isset($_GET['notify']))
{
	echo $_GET['notify'];
}
?>
</body>
</html>