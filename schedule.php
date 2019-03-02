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
ul#nav li:nth-child(3) a{
			color: #01FF00   ;
		}
</style>
</head>
<body>
<div id="container">
	<ul id="nav">
	<li>
	<a href="index.php">Home</a></li>
	<li>
	<a href="book.php">Book Flight</a></li>
	<li><a href="schedule.php">Schedules</a></li>
	<li><a href="resv_check.php">Check status</a></li>
	
	<li><a href="login.php"><?php
	if($_SESSION['uid']==""){echo "Login"; }else {echo "Logout"; }?></a></li>
	</ul>
	<div id="bfrm">
	<?php
	$insqry="select * from tbl_schedule";
$res=mysql_query($insqry,$con)or die(mysql_error());
echo '<table align="center" ><tr><th><font face="Colonna MT" color="#CC0066" size="20">Flight Schedules</font></th></tr></table><br>';
echo '<table border="4" bordercolor="#CC66FF" align="center" cellspacing="10" cellpadding="5"><tr><th>Sno</th><th>Flight Code</th><th>Date</th><th>From</th><th>To</th><th>Departure time</th><th>Arrival time</th></tr>';

    while($row=mysql_fetch_array($res))
    {
	
	echo "<td>".$row['sid']."</td>";
	echo "<td>".$row['fcode']."</td>";
	echo "<td>".$row['sdate']."</td>";
	echo "<td>".$row['sfrom']."</td>";
	echo "<td>".$row['sto']."</td>";
	echo "<td>".$row['departure']."</td>";
	echo "<td>".$row['arrival']."</td>";
	echo "</tr>";
    }
echo "</table>";

?>

	</div>
	
	
	</div>
	
</div>
</body>
</html>
