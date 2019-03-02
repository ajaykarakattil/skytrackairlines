<?php
$con=mysql_connect('localhost','root','') or die('connection not established');
mysql_select_db('db_airline',$con);
$rid=$_REQUEST['rid'];
$fid=$_REQUEST['fid'];
$jd=$_REQUEST['jd'];
$cdate=date("Y-m-d");
$del="delete from tbl_reserv where rid='$rid'";
mysql_query($del,$con);
$av="update tbl_avail set avail_seat=avail_seat+1 where fcode='$fid' and jdate='$jd'";
mysql_query($av,$con);
$cl="insert into tbl_cancel (rid,cdate) values('$rid','$cdate')";
mysql_query($cl,$con);
echo '<script>alert("Successfully Cancelled");</script>';
echo '<script type="text/javascript">
           window.location = "admin_res.php"</script>';
?>
