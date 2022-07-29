<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($con);
$dollarvalue = $user_data['balance'] / 100;
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Social Credits - Home</title>
					    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
		<script src="divremover.js"></script>
	</head>
	<body>
		<p style="font-family:verdana">
			<h1>Social Credits (Home)</h1><br>
			Hello, <?php echo $user_data['user_name'];?>! <br>
			Your current balance is <?php echo $user_data['balance'];?> Social Credits. <br>
			Your balance is worth <?php echo $dollarvalue;?> Dollars. <br>
			<a href="listings.php">See listings</a> <br>
			<a href="rules.html">Rules</a> <br>
			<?php 
				if ($user_data['isadmin'] == 1)
				{
					echo 'You are an admin! Click <a href="adminpanel.php">here</a> to go to the admin panel. <br>';
				}
			?>
			<a href="trade.php">Trade a user</a>  <br>
			<a href="data.php">Your account data</a> <br>
			<a href="logout.php">Logout</a><br> <br>
			
			<h2>Other Actions</h2>
			<a href="buy.php">Buy and sell Social Credits</a> <br>
			Upcoming features: <br>
			Fixes for listings. <br>
			Live chat engine for chatting in the website. <br>
		</p>
	</body>
</html>
			