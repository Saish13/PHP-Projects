<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$con=mysql_connect('localhost','root','');
mysql_select_db('users');
$res='select rno,sname,date,time from student ';

$result=mysql_query($res);
echo '<table border="5" cellpadding="5"><tr><td>rno</td><td>NAME</td><td>DATE</td><td>TIME</td></tr>';
while($row =mysql_fetch_array($result))
{
	//while($row = mysql_fetch_array($results)){
	    echo "<tr><td>".$row['rno'];
		echo "</td><td>".$row['sname'];

		echo "</td><td>".$row['date'];
	echo "</td><td>".$row['time'];
		
		echo "</td></tr>";
		}
	echo '</table>';

	
	/*$rno=$row['rno'];
$status=$row['status'];

echo "$rno <br>  "; 
echo "$status<br>";
*/

?>

<?php
if($_GET)
{
$se= $_GET['search'];

$rn=$_GET['sea'];
$con=mysql_connect('localhost','root','');
if($con){
mysql_select_db("users",$con);
$query= "SELECT rno,sname,date,status FROM student WHERE status= '" . $se . "' AND rno='".$rn."'";
$results=mysql_query($query);
	echo '<table border="5" cellpadding="5"><tr><td>rno</td><td>sname</td><td>date</td><td>status</td></tr>';
while($row = mysql_fetch_array($results)){
   echo "<tr><td>".$row['rno'];
		echo "</td><td>".$row['sname'];

		echo "</td><td>".$row['date'];
	
		echo "</td><td>".$row['status'];
		echo "</td></tr>";
		}
	echo '</table>';

		}
	echo '</table>';
}



?>

<html>
<form action="" method="GET">
find :<br/>
 <input type="radio" name="search" value="present">PRESENT</input>
 <input type="radio" name="search" value="absent">ABSENT	</input>
  <input type="text" name="sea" ></input>
<input type="submit" value="submit">




</form>


</html>