<?php
session_start();

include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	// Something posted
	$user_name = $_POST['user_name'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	
	if (!empty($user_name) && !empty($password) && !is_numeric($user_name) && !empty($email)) { // << Check for password or username empty
	
	// Save to phpMyAdmin
	$user_id = rand(10000, 999999999999999);
	$balance = 1000; // Balance to give user when first signed up.
	$isadmin = 0;
	$isbanned = 0;
	$isdeleted = 0;
	$query = "insert into users (user_id,user_name,password,balance,isadmin,isbanned,isdeleted,email) values ('$user_id','$user_name','$password','$balance','$isadmin','$isbanned','$isdeleted','$email')";
	mysqli_query($con,$query);
	header("Location: login.php");
	die;
	
	}else
	{
		echo "Username or password cannot be empty!";
	}
}



?>

<!DOCTYPE html>
<html>
	<head>
		<title>Social Credits - Signup</title>
					    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	</head>
	<body>
		<p style="font-family:verdana">
			<form method="post">
			
			Sign up here! <br> <br>
			
			<input type="text" name="user_name" class="form-control" placeholder=" Social Credits Username"> <br> <br>
			<input type="password" name="password" class="form-control" placeholder="Social Credits Password">	<br> <br>
			<input type="email" name="email" class="form-control" placeholder="Social Credits Email"> <br> <br>
			<button type="submit" class="btn btn-primary">Sign up</button> <br>
			DISCLAIMER: This website is in no way attempting to store login credentials from any other service but the Social Credits Platform (This Website.) <br>
			<a href="login.php">Have an account already? Login!</a><br>
			</form>
		</p>
	</body>
</html>