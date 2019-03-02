<?php
$con=mysql_connect('localhost','root','') or die('connection not established');
mysql_select_db('db_airline',$con);
$code=$_POST['classcode'];
$cname=$_POST['cname'];
$fare=$_POST['fare'];

$fcode=$_POST['fcode'];
if(isset($_POST['Submit'])){
	$qry="insert into tbl_class (fcode,classcode,cname,fare) values('$fcode','$code','$cname','$fare')";
	mysql_query($qry,$con) or die(mysql_error());
	echo "<script>alert('Class successfully added');</script>";
	echo '<script type="text/javascript">
           window.location = "admin_class.php"
			</script>';
			}
?>