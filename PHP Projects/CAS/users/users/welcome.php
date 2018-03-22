
<center> Welcome to attendence managment MES COLLEGE
<?php 
error_reporting(E_ALL ^ E_DEPRECATED);

$conn = mysql_connect('localhost','root','') or die ('Error connecting to mysql');
mysql_select_db('test',$conn);


$rno=$_POST['rno'];
$sname=$_POST['sname'];


if(empty($rno)){
echo "<script type='text/javascript'>alert('Enter roll no !')</script> "; 
}
else if (empty($sname)){
echo "<script type='text/javascript'>alert('Enter name !')</script> "; 
} else 
{

$query= "INSERT INTO data(rno, sname,date,status,time)VALUES ('$rno', '$sname',CURDATE(),'present',CURTIME())";
mysql_query($query);


header('Location: welcome.php');
	}


	
?>


<html>
<p>Please enter Detail:<br>
<form action="index.php" method="post">
roll no:<input type="text" name="rno"><br>
 name:  <input type="text" name="sname"><br>
<input type="submit" value="submit">
</form>
</html>


<br>
<br>

<br>
<a href ="searchdb.php">view </a>

