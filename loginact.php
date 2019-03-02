<?php
session_start();

if(isset($_SESSION['logError']) && !empty($_SESSION['logError'])){
	//$_SESSION['logError']=1;
}
else{
	$_SESSION['logError']="no";
}
$con=mysql_connect('localhost','root','') or die("error in data connection");
mysql_select_db("db_airline",$con);
$uname=$_POST['uname'];
$password=$_POST['password'];


if(isset($_POST['login']))
{
if($uname==="admin" and $password==="admin"){
	echo '<script type="text/javascript">
           window.location = "admin_cp.php"</script>';
}
else{
$qry="select uid,uname,utype from tbl_user where uname='$uname' and password='$password'";
$res=mysql_query($qry,$con)or die(mysql_error());
$row=mysql_fetch_array($res);
if (empty($row)){
		echo "<script type='text/javascript'>alert('Inavlid Username/Password');</script>";
		$_SESSION['logError']="yes";
		echo '<script type="text/javascript">
           window.location = "login.php"</script>';
	}
else{
	$_SESSION['uid']=$row[0];
	echo "<script>alert('login successfully');</script>";
	echo '<script type="text/javascript">
           window.location = "index.php"
      </script>';
	  $_SESSION['logError']="no";
	exit();
}
}

}
?>