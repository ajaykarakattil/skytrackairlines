<?php
$con=mysql_connect('localhost','root','') or die('connection not established');
mysql_select_db('db_airline',$con);
$rid=$_REQUEST['rid'];
$upd="update tbl_reserv set status=1 where rid='$rid'";
mysql_query($upd,$con);

echo '<script>alert("Reservation Approved");</script>';
echo '<script type="text/javascript">
           window.location = "admin_res.php"</script>';
?>
