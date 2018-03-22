<html>
<form method="POST" action="forgot.php">
<p><input name="email" type="email" placeholder="Type your Email...">
<p><input name="submit" type="submit" value="Submit">
</form>
</html>
<?php
error_reporting(E_ALL ^ E_DEPRECATED);
if(isset($_POST['submit']))
{
	$email= $_POST['email'];
	$connect= mysql_connect('localhost','root','');
	mysql_select_db("users");
	$query= mysql_query("SELECT * FROM users WHERE email= '$email'");
	while($row= mysql_fetch_assoc($query))
	{
		$username=$row['username'];
		$password=$row['password'];
		$email1=$row['email'];
	}
	if($email==$email1)
	{
	$from= "FROM:user";
	$to=$email;
	$subject="Lost Password or Username";
	$body="Dear $username \n> Your Username is: $username \n>Your password is:$password";
	mail($to,$subject,$body,$from);
	echo"Check your inbox.";
	}
	else
	{
		echo "Incorrect Email.";
	}
}
else
{
	echo "Please fill your email.";
}
?>