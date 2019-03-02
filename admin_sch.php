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
ul#nav li:nth-child(2) a{
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
	<h2> Schedule Flight</h2>
	<div id="bfrm">
	<form name="sch_flight" action="sch_reg.php" method="post">
	<fieldset>
	<legend>Enter details</legend>
	<label>Flight code:</label>
<?php
$query="select fcode from tbl_flight";
$result2 = mysql_query($query,$con);

$options = "";

while($row2 = mysql_fetch_array($result2))
{
    $options = $options."<option value=$row2[0]>$row2[0]</option>";
}

?>
 <select name="fcode" width=20px>
            <?php echo $options;?>
        </select>
	<br>
	<label>Date:</label>
	<br>
	<input type="date" name="sdate" value=""/>
	<br>
	<label>From:<br></label>
	<input type="text" name="from" value=""/>
	<br>
	<label>To:<br></label>
	<input type="text" name="to" value=""/>
	<br>
	<label>Departure time:<br></label>
	<input type="time" name="dtime" value=""/><br>
	<label>Arrival time:<br></label>
	<input type="time" name="atime" value=""/>
	<input type="submit" name="Submit" value="submit"/>
	<br>
	</form>
	</div>
	</div>
	<div id="footer">
	</div>
</div>
</body>
</html>
