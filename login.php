<?php
session_start();
if(isset($_SESSION['logError']) && !empty($_SESSION['logError'])){
	//$_SESSION['logError']=1;
}
else{
	$_SESSION['logError']="No";
}
$_SESSION['uid']="";
$_SESSION['jdate']="";
$_SESSION['seat']="";
$_SESSION['ad']="";
$_SESSION['pname1']="";
	$_SESSION['address1']="";
	$_SESSION['gender1']="";
	$_SESSION['dob1']="";
	$_SESSION['email1']="";
	$_SESSION['pname2']="";
	$_SESSION['address2']="";
	$_SESSION['gender2']="";
	$_SESSION['dob2']="";
	$_SESSION['email2']="";
?>
<html>
<head>
<style>
body{
//background-color:#FCF5F3;
}
fieldset{
margin-left:500px;
margin-top:250px;
margin-bottom:250px;
margin-right:500px;
padding-left:70px;
background-color:#f2f0eb ;
}
input[type="text"]{
width=100%;
padding: 12px 100px;
    
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type="password"]{
padding: 12px 100px;
    
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	}
	
input[type="submit"]{

width=100%;
margin-left:20px;
margin-top:10px;
padding:8px 30px 8px 30px;

}
input[type="button"]{

width=100%;
margin-left:20px;
margin-top:10px;
padding:8px 30px 8px 30px;

}
</style>

<body>

<table>

  <form name="mylogin" action="loginact.php" method="post">
    <fieldset>
	<legend><h1 style="color:red;font-style:oblique;font-size:26px;">Login</h1></legend>
    
	<h3 style="color:Red;"><b><?php
	if($_SESSION['logError']=="yes")
     echo "Invalid username/password";?></h3>
    <b>Username</b><br>
	<input type="text" placeholder="Enter Username" name="uname" required><br>
    <b>Password</b><br>
    <input type="password" placeholder="Enter Password" name="password" required><br>
    <input type="submit" value="Login" name="login">
	<input type="button" value="Sign up" name="regist" onclick="location.href='signup.html';"><br>
	
	 </fieldset>
	 
  </form>
</div>



</body>
</html>
