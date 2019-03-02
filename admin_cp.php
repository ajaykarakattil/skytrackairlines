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
			
			
		}
ul#nav li:nth-child(1) a{
			color: #01FF00   ;
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
	<h2> Add Flight details</h2>
	
	<form name="add_flight" action="flight_reg.php" method="post">
	<div id="bfrm">
	<fieldset>
	<legend>Enter details</legend>
	<label>Airline name:</label>
	<br><input type="text" name="airln" value=""/>
	<br>
	<label>Flight name:</label>
	<br>
	<input type="text" name="fname" value=""/>
	<br>
	<label>Total capacity:<br></label>
	<input type="text" name="capacity" value=""/>
	<br>
	<input type="submit" name="Submit" value="submit"/>
	<br>
	</fieldset><br>
	</div>
	</form>
	</div>
	</div>
	<div id="footer">
	</div>
</div>
</body>
</html>
