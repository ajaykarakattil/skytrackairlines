<?php
session_start();
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
<head><link rel="stylesheet" type="text/css" href="css/s1.css">
<style>

ul#nav li:nth-child(4) a{
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
	<li><a href="">Check status</a></li>
	
	<li><a href="login.php"><?php
	if($_SESSION['uid']==""){echo "Login"; }else {echo "Logout"; }?></a></li>
	</ul>
<form action="#" method="post">
<div id="content">
<div id="bfrm">
<br>
<label>&nbsp Enter Reservation ID : </label><input type ="number" name="rid" value="">
<br><input type="submit" value="Submit" name="submit"><br>
<?php
if(isset($_POST['submit'])){
	if(isset($_POST['rid'])and !empty($_POST['rid'])){
	$rid=$_POST['rid'];
	$qry="select sid from tbl_reserv where rid=$rid";
	$res=mysql_query($qry,$con);
	$res=mysql_fetch_array($res);
	if(!empty($res)){
		$qry="select sid from tbl_reserv where rid=$rid and status=1";
		$res=mysql_query($qry,$con);
		$res=mysql_fetch_array($res);
		if(!empty($res)){
			$qry="select * from tbl_schedule where sid=$res[0]";
			$res=mysql_query($qry,$con);
			echo '<table align="center" ><tr><th><font face="Colonna MT" color="#FFADF0" size="16">Flight Details</font></th></tr></table><br>';
			echo '<table border="4" bordercolor="#CC66FF" align="center" cellspacing="10" cellpadding="5"><tr><th>Flight Code</th><th>Date</th><th>From</th><th>To</th><th>Departure time</th><th>Arrival time</th></tr>';

			while($row=mysql_fetch_array($res))
			{
	
			echo "<td>".$row['fcode']."</td>";
			echo "<td>".$row['sdate']."</td>";
			echo "<td>".$row['sfrom']."</td>";
			echo "<td>".$row['sto']."</td>";
			echo "<td>".$row['departure']."</td>";
			echo "<td>".$row['arrival']."</td>";
			echo "</tr>";
			}
			echo "</table>";
			echo '<p style="color:#4DE0FF;font:22px oblique;">Thanks for using SkyTrack.<br> Pack your Bag ontime. Happy journey</p>';
		}
		else{
			echo '<p style="color:red;font:22px oblique;">Your order is still under processing. Please be patient</p>';
			}
	}		
	else{
		echo '<p style="color:red;font:22px oblique;">Invalid Reservation ID</p>';
		}
	}
}
?>
<br>
</div>
</div>
</form>	
	</div>
	
</div>
</body>
</html>
