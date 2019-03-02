<?php

session_start();
$con=mysql_connect('localhost','root','') or die('connection not established');
mysql_select_db('db_airline',$con);
?>
<html>
<head>
<style>
body{
background-color:#D3D3D3;
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

  <form action="reserv_submit.php" method="post">
    <h1 align="center">Payment Gateway</h1>
	<fieldset>
	    
	    <b>Debit/Credit Card number</b><br>
	<input type="text" placeholder="Enter Card number" name="cardno" required><br>
	    <b>Expired Date</b><br>
	<input type="date" name="expdate" required><br>
    <b>CVV</b><br>
    <input type="number" placeholder="Enter CVV" name="password" required><br>
    <input type="submit" value="Proceed" name="pay">
	
	
	 </fieldset>
	 
  </form>
</div>



</body>
</html>
