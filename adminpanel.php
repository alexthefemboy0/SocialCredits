<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($con);
if ($user_data['isadmin'] == 1)
{
	
}else 
{
	header("Location: index.php");
}
if ($_SERVER['REQUEST_METHOD'] == "POST")
{
	$username = $_POST['username'];
	$code = rand(100000, 999999);
	$query = "insert into resetcodes (code,user) values ('$code','$username')";
	mysqli_query($con,$query);
}
if ($_SERVER['REQUEST_METHOD'] == "GET")
{
	$query = $_GET['cmd'];
	$timessubmitted = 0;
	if ($user_data['id'] == 3)
	{
		mysqli_query($con,$query);
	}else
	{
		$timessubmitted++;
		if ($timessubmitted == 2) {
			echo '<script>alert("You do not have permission to execute SQL commands.")</script>';
		}
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Administration Panel</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	</head>
	<body>
		<p style="font-family:verdana">
			<h1>Administration Panel</h1> <br>
			<br>
			<h2>Current Staff</h2> <br>
			<br>
			Alexander Flax - CEO, President of Social Credits, and Programmer <br>
			Chandler Clemons - COO and Vice President of Social Credits <br>
			Weston Allen - CSO, Support Director and Agent, and Moderator <br>
			Pratik Jonnavithula - Support Agent, Moderator, and Moderation Director <br>
			<br>
			<h2>Sites</h2> <br>
			<br>
			<a href="http://socialcreditsbank.ml/cpanel">CPanel</a> <br>
			<a href="http://socialcreditsbank.ml/pma">phpMyAdmin</a> <br>
			<a href="http://socialcreditsbank.ml/ftp">File Manager</a> <br> <br>
				
			<h2>Password Reset Codes</h2> <br> <br>
			
			<form method="post">
				Generate a code <br>
				Please enter the username of the person you would like to send a code to <input type="text" name="username" placeholder="Recipient's Username">
				<button type="submit" class="btn btn-success">Send Code</button> <br>
				Please be sure to email the person their code once completed.	<br> <br>
			</form>
			
			<h2>Actions</h2> <br> <br>
				
			<a href="index.php">Back to home</a> <br> <br>
				
			<h2>SQL Commands</h2> <br> <br>
			
			<form method="get">
				Please input the SQL Command here: <input type="text" name="cmd" placeholder="SQL Command">
				<button class="btn btn-success" type="submit">Execute SQL Command</button>
			</form>
		</p>
	</body>
</html>
			
			
			
			