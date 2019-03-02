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
ul#nav li:nth-child(3) a{
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
	<h2> Add Class details</h2>
	<div id="bfrm">
<form name="add_flight" action="class_reg.php" method="post">
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
	<label>Class code:</label>
	<br>
	<input type="text" name="classcode" value=""/>
	<br>
	<label>Class name:<br></label>
	<input type="text" name="cname" value=""/>
	<br>
	<label>Fare:<br></label>
	<input type="text" name="fare" value=""/>
	<br>
	
	<input type="submit" name="Submit" value="submit"/>
	<br>
	</form>
	</div>
	</div>
	
</div>
</body>
</html>
