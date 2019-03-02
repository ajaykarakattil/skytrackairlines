<?php
session_start();
$con=mysql_connect('localhost','root','') or die('connection not established');
mysql_select_db('db_airline',$con);
if(isset($_SESSION['uid']) && !empty($_SESSION['uid'])){
	$_SESSION['uid']=1;
}
else{
	$_SESSION['uid']="";
}



?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/s1.css">
<style>
body{
background-color:#D3D3D3;
}
ul#nav li:nth-child(1) a{
			color: #01FF00   ;
		}
</style>
</head>
<body>
<div id="container">
	
	
	<ul id="nav">
	<li>
	<a href="index.php">Home</a></li>
	<li>
	<a href="book.php">Book Flight</a></li>
	<li><a href="schedule.php">Schedules</a></li>
	<li><a href="resv_check.php">Check status</a></li>
	
	<li><a href="login.php"><?php
	if($_SESSION['uid']==""){echo "Login"; }else {echo "Logout"; }?></a></li>
	</ul>
	<div id="header">
	<img src="images/head.jpg" width="101.5%" height="35%">
	</div>
<form action="#" method="post">
<div id="head1">
<h1 align="center" color="">Welcome to Skytrack airlines</h1>
<h3 align="center" style="color:#FF9F1D;font-size:26px"> We offers :</h3>
</div>

<div class="slideshow-container">


<div class="mySlides fade">
  <div class="numbertext">1 / 4</div>
  <img src="images/1.jpg" style="width:100%">
  <div class="text">Perfect Assistance</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 4</div>
  <img src="images/2.jpg" style="width:100%">
  <div class="text">Free High speed WiFi</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 4</div>
  <img src="images/3.jpg" style="width:100%">
  <div class="text">Offers DirectTV</div>
</div>
<div class="mySlides fade">
  <div class="numbertext">4 / 4</div>
  <img src="images/4.jpg" style="width:100%">
  <div class="text">Free Wine and food</div>
</div>
</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>


<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 2000);
}
</script>

</form>	
<div id="sup">
<h3 align="center"style="color:#FF9F1D;font-size:26px">We support :</h3>
<img src="images/a1.jpg" style="width:100%">

</div>
<div id="footer">
	<p style="color:#FFFFFF;">&copy;Ajay Mohan,MCA dept ICET. (Please don't steal my work)</p>

	</div>
	</div>
	
</div>
</body>
</html>
