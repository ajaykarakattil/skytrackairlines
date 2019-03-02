<?php
session_start();
$con=mysql_connect('localhost','root','') or die('connection not established');
mysql_select_db('db_airline',$con);
?>
<html>
<head></head>
<body>
<?php
$uid=$_SESSION['uid'];
$fid=$_SESSION['fid'];
$sid=$_SESSION['schid'];
$s=$_SESSION['seat'];
$jdate=$_SESSION['jdate'];
$ad=$_SESSION['ad'];
$pn1=$_SESSION['pname1'];
$add1=$_SESSION['address1'];
$gen1=$_SESSION['gender1'];
$dob1=$_SESSION['dob1'];
$email1=$_SESSION['email1'];


if($ad==2){

$pn2=$_SESSION['pname2'];
$add2=$_SESSION['address2'];
$gen2=$_SESSION['gender2'];
$dob2=$_SESSION['dob2'];
$email2=$_SESSION['email2'];

}


if(isset($_POST['pay'])){

$sbal=$s-$ad;

$avlqry="update tbl_avail set avail_seat='$sbal' where fcode='$fid' and jdate='$jdate'";
mysql_query($avlqry,$con)or die(mysql_error());
$pquery="insert into tbl_passenger(fcode,name,address,gender,dob,email) values('$fid','$pn1','$add1','$gen1','$dob1','$email1')";
mysql_query($pquery,$con);
$pqry="select max(pno) from tbl_passenger";
$res=mysql_query($pqry,$con);
$res=mysql_fetch_array($res);
$resqry="insert into tbl_reserv (uid,sid,fcode,pid,jdate) values('$uid','$sid','$fid','$res[0]','$jdate')";
mysql_query($resqry,$con)or die(mysql_error());
$rqry="select max(rid) from tbl_reserv";
$res=mysql_query($rqry,$con);
$res=mysql_fetch_array($res);
echo '<h1 align="center">Reciept</h1>';
echo '<br><br><table align="center"><tr><td>Reservation ID :</td><td>'.$res[0].'</td></tr>';
echo '<tr><td>Journey Date:</td><td>'.$jdate.'</td></tr>';
echo '<tr><td>Passenger Name:</td><td>'.$pn1.'</td></tr></table>';
if($ad==2){
$pquery="insert into tbl_passenger(fcode,name,address,gender,dob,email) values('$fid','$pn2','$add2','$gen2','$dob2','$email2')";
mysql_query($pquery,$con);
$pqry="select max(pno) from tbl_passenger";
$res=mysql_query($pqry,$con);
$res=mysql_fetch_array($res);
$resqry="insert into tbl_reserv (uid,sid,fcode,pid,jdate) values('$uid','$sid','$fid','$res[0]','$jdate')";
mysql_query($resqry,$con)or die(mysql_error());
$rqry="select max(rid) from tbl_reserv";
$res=mysql_query($rqry,$con);
$res=mysql_fetch_array($res);

echo '<br><br><table align="center"><tr><td>Reservation ID :</td><td>'.$res[0].'</td></tr>';
echo '<tr><td>Journey Date:</td><td>'.$jdate.'</td></tr>';
echo '<tr><td>Passenger Name:</td><td>'.$pn2.'</td></tr></table>';

}
echo "<script>window.print()</script>";
echo '<script type="text/javascript">
           window.location = "index.php"</script>';
}
//echo $uid;

?>