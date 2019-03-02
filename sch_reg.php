<?php
$con=mysql_connect('localhost','root','') or die('connection not established');
mysql_select_db('db_airline',$con);
$sdate=$_POST['sdate'];
$atime=$_POST['atime'];
$dtime=$_POST['dtime'];
$from=strtoupper($_POST['from']);
$to=strtoupper($_POST['to']);
$fcode=$_POST['fcode'];
$avl="select capacity from tbl_flight where fcode='$fcode'";
$avl_res=mysql_query($avl,$con)or die(mysql_error());
$avl_res=mysql_fetch_array($avl_res);

if(isset($_POST['Submit'])){
	$qry="insert into tbl_schedule (fcode,sdate,sfrom,sto,departure,arrival) values('$fcode','$sdate','$from','$to','$dtime','$atime')";
	$avl_qry="insert into tbl_avail(fcode,jdate,avail_seat) values('$fcode','$sdate','$avl_res[0]')";
	mysql_query($qry,$con) or die(mysql_error());
	mysql_query($avl_qry,$con) or die(mysql_error());
	echo "<script>alert('Schedule successfully added');</script>";
	echo '<script type="text/javascript">
         window.location = "admin_sch.php"
			</script>';
			}
?>