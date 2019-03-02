<?php

$con=mysql_connect('localhost','root','') or die('connection not established');
mysql_select_db('db_airline',$con);
$name=$_POST['name'];
$phone=$_POST['phone'];
$dob=$_POST['dob'];
$city=$_POST['city'];
$state=$_POST['state'];
$country=$_POST['country'];
$pass=$_POST['pass'];
$uname=$_POST['uname'];
$qry="insert into tbl_user(name,phone,dob,city,state,country,password,utype,uname) values ('$name','$phone','$dob','$city','$state','$country','$pass','local','$uname')";
mysql_query($qry,$con) or die("data error");

echo "User registration successfully";
echo '<script type="text/javascript">
           window.location = "login.php"</script>';

?>
