<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($con);
?>
<!DOCTYPE html>
<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
		<title>Buy Social Credits</title>
	</head>
	<body>
		<p style="font-family:verdana">
			<h1>Buy Social Credits</h1> <br> <br>
				
			You may buy Social Credits from us or from a private party. We strongly recommend buying from us.<br>
			<br>
			<h2>To buy from us</h2> <br>
			Thank you for buying Social Credits. Once done, check your email to get what site you should go to. <br>
			<a href="http://poof.io/store/@CashSocials">Go to our store</a> <br> <br>
				
			<h2>To buy or sell from Private Party</h2> <br>
			If you want to buy or sell from a private party, please click <a href="privateparty.php">here</a>. <br>
			<br>
			If you want to sell your Social Credits, you first need to click on the link above. Then find a buyer who is willing to buy from you. Then, send them the Social Credits they want. They should pay you. If they dont, report the user to us, and we will take action. Have fun!	
			
		</p>
	</body>
</html>
	