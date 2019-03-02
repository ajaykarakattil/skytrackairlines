<?php
$con=mysql_connect('localhost','root','') or die('connection not established');
mysql_select_db('db_airline',$con);
$aname=$_POST['airln'];
$fname=$_POST['fname'];
$capacity=$_POST['capacity'];
if(isset($_POST['Submit'])){
	$qry="insert into tbl_flight (airline,fname,capacity) values('$aname','$fname','$capacity')";
	mysql_query($qry,$con) or die(mysql_error());
	echo "<script>alert('Fight successfully added');</script>";
	echo '<script type="text/javascript">
           window.location = "admin_cp.php"
			</script>';
			}
?>