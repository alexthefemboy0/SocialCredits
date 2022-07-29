<?php

session_start();

include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	// Something posted
	$user_name = $_POST['user_name'];
	$password = $_POST['password'];
	
	if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) { // << Check for password or username empty
	
	// Read from phpMyAdmin
	$query = "select * from users where user_name = '$user_name' limit 1";
	$result = mysqli_query($con,$query);
	if ($result)
	{
		if ($result && mysqli_num_rows($result) > 0)
		{
			$user_data = mysqli_fetch_assoc($result);
			if ($user_data['password'] === $password)
			{
				$_SESSION['user_id'] = $user_data['user_id'];
				header("Location: index.php");
				die;
			}
		}
	}
	echo '<script type="text/javascript">alert("Username or password is incorrect.")</script>';
	}else
	{
		echo '<script type="text/javascript">alert("Username or password is incorrect.")</script>';
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Social Credits - Login</title>
					    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	</head>
	<body>
		<p style="font-family:verdana">
			<form method="post">
			
			Login to your account here. <br> <br>
			
			<input type="text" name="user_name" class="form-control" placeholder="Social Credits Username"> <br>
			<input type="password" name="password" class="form-control" placeholder="Social Credits Password">	<br>
			<button type="submit" class="btn btn-primary">Log In</button> <br>
			DISCLAIMER: This website is in no way attempting to store login credentials from any other service but the Social Credits Platform (This Website.) <br>
			<a href="signup.php">Dont have an sC banking account? Sign up!</a><br>
			<a href="emailverify.php">Forgot your password? Reset it here!</a> <br>
			<a href="ssignon.php">Use SessionID Sign-On.</a><br>
			</form>
		</p>
	</body>
</html>