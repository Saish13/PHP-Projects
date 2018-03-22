<html>
<form action="register.php" method="POST">
<p><input type="text" name="username" placeholder="Username">
<p><input type="email" name="email" placeholder="Email">
<p><input type="password" name="pass" placeholder="Password">
<p><input type="password" name="pass1" placeholder="Password">
<p><input type="submit" name="submit" placeholder="Register">
</form>
</html>
<?php
error_reporting(E_ALL ^ E_DEPRECATED);
if(isset($_POST['submit']))
{
	$username= mysql_real_escape_string($_POST['username']);
	$pass= mysql_real_escape_string($_POST['pass']);
	$pass1= mysql_real_escape_string($_POST['pass1']);
	$email= mysql_real_escape_string($_POST['email']);
	if($username && $pass && $pass1 && $email)
	{
		if($pass==$pass1)
		{
			$connect= mysql_connect('localhost','root','');
			mysql_select_db("users");
			$query= mysql_query("INSERT INTO users VALUES('$username','$pass','$email');");
			echo "You have been registered.";
		}
		else
		{
			echo"Password must match.";
		}
	}
	else
	{
		echo "All fields are required.";
	}
	
}
?>