<?php
$con=mysql_connect('localhost','root','') or die('connection not established');
mysql_select_db('db_airline',$con);
if(isset($_SESSION['uid']) && !empty($_SESSION['uid'])){
	$_SESSION['uid']=1;
}
else{
	$_SESSION['uid']="";
}
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="css/s1.css">
<style>
ul#nav li:nth-child(2) a{
			color: #01FF00   ;
		}
</style>
</head>
<body style=" background-color:#D3D3D3;">
<div id="container">
	
	
	<ul id="nav">
	<li>
	<a href="index.php">Home</a></li>
	
	<li>
	<a href="book.php">Book Flight</a></li>
	<li><a href="schedule.php">Schedules</a></li>
	<li><a href="resv_check.php">Check status</a></li>
	
	<li><a href="login.php">Logout</a></li>
	</ul>
	
<form action="#" method="post">
<div id="bfrm">

<fieldset><legend>Search</legend>

<label>Date&nbsp&nbsp:</label>&nbsp<input type="date" name="bdate" value=""/><br>
<label>From :</label>


<?php
$query="select distinct(sfrom) from tbl_schedule";
$result2 = mysql_query($query,$con);

$options = "";

while($row2 = mysql_fetch_array($result2))
{
    $options = $options."<option value=$row2[0]>$row2[0]</option>";
}

?>
 <select name="bfrom" width=20px>
            <?php echo $options;?>
        </select>


<br>
<label>To &nbsp&nbsp&nbsp&nbsp:</label>

<?php
$query="select distinct(sto) from tbl_schedule";
$result2 = mysql_query($query,$con);

$options = "";

while($row2 = mysql_fetch_array($result2))
{
    $options = $options."<option value=$row2[0]>$row2[0]</option>";
}

?>
 <select name="bto" width=20px>
            <?php echo $options;?>
        </select>

<br>
<input type="submit" name="search" value="search"/><br>
	<?php
if(isset($_POST['search'])){
$bdate=$_POST['bdate'];
$bfrom=$_POST['bfrom'];
$bto=$_POST['bto'];

$insqry="select * from tbl_schedule where sdate='$bdate' and sfrom='$bfrom' and sto='$bto'";
$res=mysql_query($insqry,$con)or die(mysql_error());
echo '<table align="center" ><tr><th><font face="Colonna MT" color="#CC0066" size="20">Flight Schedules</font></th></tr></table><br>';
echo '<table border="4" bordercolor="#CC66FF" align="center" cellspacing="10" cellpadding="5"><tr><th>Sno</th><th>Flight Code</th><th>Date</th><th>From</th><th>To</th><th>Departure time</th><th>Arrival time</th><th>Book Now</th></tr>';

    while($row=mysql_fetch_array($res))
    {
	$tt=$row['sid'];
	$ff=$row['fcode'];
	echo "<td>".$row['sid']."</td>";
	echo "<td>".$row['fcode']."</td>";
	echo "<td>".$row['sdate']."</td>";
	echo "<td>".$row['sfrom']."</td>";
	echo "<td>".$row['sto']."</td>";
	echo "<td>".$row['departure']."</td>";
	echo "<td>".$row['arrival']."</td>";
    echo '<td><a href="pass_details.php?schid='.$tt.'&fid='.$ff.'">Book</a></td>';
	echo "</tr>";
    }

echo "</table>";
}
?>
</fieldset>
</div>
</form>	
	</div>
	<div id="footer">
	</div>
</div>
</body>
</html>
