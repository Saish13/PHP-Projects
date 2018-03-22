<center> MESCOLLEGE ATTENENCE MANAGMENT
<?php 
$connect= mysql_connect('localhost','root','');
			mysql_select_db("users");
error_reporting(E_ALL ^ E_DEPRECATED);
include "index.php";

global $rno,$sname;
$rno=$_POST['rno'];
#$sname=$_POST['sname'];
$sqlstr="insert into student (rno,date,time)values('$rno',CURDATE(),CURTIME() )";
$run=mysql_query($sqlstr);



?>

<html>
<body>
<form action="home.php" method="post">
Roll No:<input type="text" name="rno"/> <br>

<!--Name:<input type="text" name="sname" /> <br>

-->


<input type ="Submit" value="Submit"/>


<a href="view.php">view </a>
</form>
</body>
</html>