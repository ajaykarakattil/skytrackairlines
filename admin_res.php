<?php
$con=mysql_connect('localhost','root','') or die('connection not established');
mysql_select_db('db_airline',$con);
?>

<html>
<head>
<head><link rel="stylesheet" type="text/css" href="css/s1.css">
<style>
ul#nav li:nth-child(1) {
			margin: 5% 3% 0% 20%;
			
			//border:1px solid red;
			//padding:5%;
			
		}
ul#nav li:nth-child(4) a{
			color: #01FF00   ;
		}
		#a1{
			color:yellow;
			text-decoration:none;
			background:#6E4206  ;
		}
</style>
</head>
<body>
<div id="container">
	<div id="header">
	Admin CP
	</div>
	
	<ul id="nav">
	<li>
	<a href="admin_cp.php">Add Flight</a></li>
	<li><a href="admin_sch.php">Schedule Flight</a></li>
	<li><a href="admin_class.php">Add class</a></li>
	<li><a href="admin_res.php">Reservations</a></li>
	<li><a href="login.php">Logout</a></li>
	</ul>
	
	<div id="content">
	<h2> Reservations</h2>
	<div id="bfrm" style="margin-right:0%">
	<form name="res_app" method="post">
	<?php
	$qry="select * from tbl_reserv where status=0";
	$res=mysql_query($qry,$con);
	$res=mysql_fetch_array($res);
	if(!empty($res)){
	$insqry="select r.rid,f.fname,p.name,r.jdate,r.fcode from tbl_reserv r,tbl_passenger p,tbl_flight f where p.pno=r.pid and f.fcode=r.fcode and r.status=0";
	$res=mysql_query($insqry,$con)or die(mysql_error());
	
	echo '<table border="4" bordercolor="#CC66FF" align="center" cellspacing="10" cellpadding="5"><tr><th>Reservation ID</th><th>Flight Code</th><th>Passenger Name</th><th>Date</th><th></th></tr>';

    while($row=mysql_fetch_array($res))
    {
	$rid=$row[0];
	$fcode=$row[4];
	$jdate=$row[3];
	echo "<td>".$row[0]."</td>";
	echo "<td>".$row[1]."</td>";
	echo "<td>".$row[2]."</td>";
	echo "<td>".$row[3]."</td>";
	
    echo '<td><a id="a1" href="res_app.php?rid='.$rid.'">Approve</a><br><br><a id="a1" href="res_can.php?rid='.$rid.'&fid='.$fcode.'&jd='.$jdate.'">Cancel</a></td>';
	echo "</tr>";
    }

echo "</table>";
	}
	else
	{
		echo '<p align="center" style="color:red;font:18px oblique">No pending Reservations available</p>';
	}
	?>
	</form>
	<br></div>
	</div>
	<div id="footer">
	</div>
</div>
</body>
</html>
