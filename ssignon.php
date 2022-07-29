<?php
session_start();
include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$_SESSION['user_id'] = $_POST['sessionid'];
	header("Location: index.php");
	die;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Social Credits - Login (SESSION SIGN ON)</title>
					    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	</head>
	<body>
		<p style="font-family:verdana">
			<form method="post">
			
			Login to your account here via a session ID. NOTE: Only if you know your Account ID should you use this sign-on method. <br> <br>
			
			<input type="text" name="sessionid" class="form-control" placeholder="Social Credits Account ID"> <br>
			<button type="submit" class="btn btn-primary">Log In</button> <br>
			DISCLAIMER: This website is in no way attempting to store login credentials from any other service but the Social Credits Platform (This Website.) <br>
			<a href="login.php">Regular sign-on</a><br>
			</form>
		</p>
	</body>
</html>