<?php
session_start();
$con=mysql_connect('localhost','root','') or die('connection not established');
mysql_select_db('db_airline',$con);
$f=$_REQUEST['fid'];
$_SESSION['fid']=$f;
$s=$_REQUEST['schid'];
$_SESSION['schid']=$s;
$jdate=mysql_query("select sdate from tbl_schedule where sid='$s'",$con)or die(mysql_error());
$jdate=mysql_fetch_array($jdate);
$_SESSION['jdate']=$jdate[0];

?>


<html>
<head>
<head><link rel="stylesheet" type="text/css" href="css/s1.css">
<style>
body{
background-color:#D3D3D3;
}
ul#nav li:nth-child(2) a{
			color: #01FF00   ;
		}
</style>
</head>
<body>
<div id="container">
	
	
	<ul id="nav">
	<li><a href="index.php">Home</a></li>
	<li>
	<a href="book.php">Book Flight</a></li>
	<li><a href="schedule.php">Schedules</a></li>
	<li><a href="resv_check.php">Check status</a></li>
	<li><a href="login.php">Logout</a></li>
	</ul>
	<div id="bfrm">
<form  method="post">

<label>Select class :</label>

<?php
$query="select cname from tbl_class where fcode='$f'";
$result2 = mysql_query($query,$con);

$options = "";

while($row2 = mysql_fetch_array($result2))
{
    $options = $options."<option value=$row2[0]>$row2[0]</option>";
}

?>
 <select name="sclass" width=20px>
            <?php echo $options;?>
        </select>


<br>
<label>No.of Adults :</label>

 <select name="adult" width=20px>
          <option>1</option>
		  <option>2</option>
		 
        </select>

<br>
<input type="submit" name="search" value="search"/><br>
	<?php

	if(isset($_POST['proceed'])){
	$_SESSION['pname1']=$_POST['pname1'];
	$_SESSION['address1']=$_POST['address1'];
	$_SESSION['gender1']=$_POST['gender1'];
	$_SESSION['dob1']=$_POST['dob1'];
	$_SESSION['email1']=$_POST['email1'];
	if($_SESSION['ad']==2){
		$_SESSION['pname2']=$_POST['pname2'];
	$_SESSION['address2']=$_POST['address2'];
	$_SESSION['gender2']=$_POST['gender2'];
	$_SESSION['dob2']=$_POST['dob2'];
	$_SESSION['email2']=$_POST['email2'];
	}
	echo '<script type="text/javascript">
           window.location = "payment.php"
		</script>';
}
	
if(isset($_POST['search'])){
	$cls=$_POST['sclass'];
	$ad=$_POST['adult'];
	$seat=mysql_query("select avail_seat from tbl_avail where fcode='$f' and jdate='$jdate[0]'",$con)or die(mysql_error());
	$seat=mysql_fetch_array($seat);
	
	if($ad<=$seat[0])
	{
		$cl=mysql_query("select fare,classcode from tbl_class where fcode='$f' and cname='$cls'",$con)or die(mysql_error());
		$cl=mysql_fetch_array($cl);
		$tax=0.25;
		$_SESSION['ad']=$ad;
		$_SESSION['seat']=$seat[0]-$ad;
		
		}
		$total=(float)$cl[0]*(float)$ad*(float)$tax;
		$total=((float)$cl[0]*$ad)+$total;
		echo"<fieldset><legend>Reservation</legend><br>";
		echo $ad."x".$cl[1]."=".$cl[0]*$ad."<br>";
		echo "Tax =25%<br>";
		echo "Total =".$total;
		echo"</fieldset>";
		echo '<fieldset><legend>Passenger1</legend><br><label>Name :</label><input type="text" name="pname1" value="" required/><br>';
			echo '<br><label>Address :</label><textarea name="address1" rows="4" cols="30" required></textarea><br>';
			echo '<label>Gender :</label><input type="radio" name="gender1" value="male" checked>Male <input type="radio" name="gender1" value="female">Female <input type="radio" name="gender1" value="Others">Others<br>';
			echo '<label>DOB :</label><input type="date" name="dob1" required/><br>';
			echo '<label>Email :</label><input type="email" name="email1" required/><br></fieldset>';
		if($ad==2){
			echo '<fieldset><legend>Passenger2</legend><br><label>Name :</label><input type="text" name="pname2" value="" required/><br>';
			echo '<br><label>Address :</label><textarea name="address2" rows="4" cols="30" required></textarea><br>';
			echo '<label>Gender :</label><input type="radio" name="gender2" value="male" checked>Male <input type="radio" name="gender2" value="female">Female <input type="radio" name="gender2" value="Others">Others<br>';
			echo '<label>DOB :</label><input type="date" name="dob2" required/><br>';
			echo '<label>Email :</label><input type="email" name="email2" required/><br></fieldset>';
			
		}
	echo '<br><input type="submit" value="proceed" name="proceed"/>';	
}

?>


</form>	
<br>
</div>
	</div>
	<div id="footer">
	<p style="color:#FFFFFF;">&copy;Ajay Mohan,MCA dept ICET. (Please don't steal my work)</p>
	</div>
</div>
</body>
</html>
