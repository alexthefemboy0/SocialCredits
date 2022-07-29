<?php
session_start();
include("connection.php");
include("functions.php");
if ($_SERVER['REQUEST_METHOD'] == "POST")
{
	$newpassword = $_POST['newpass'];
	$resetuser = $_SESSION['resetuser'];
	$resetcode = $_SESSION['resetcode'];
	$query2 = "DELETE FROM `resetcodes` WHERE `resetcodes`.`code` = '$resetcode'";
	mysqli_query($con,$query2);
	$query = "update `users` set `password` = '$newpassword' where `users`.`user_name` = '$resetuser'";
	mysqli_query($con,$query);
	$_SESSION['resetuser'] = "";
	$_SESSION['resetcode'] = "";
	header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
		<title>Reset Your Password</title>
	</head>
	<body>
		<p style="font-family:verdana">
			<h1>Reset Password Confirmation</h1> <br>
			Our systems have found this code and has linked it to this user. Please confirm this information is correct. <br>
			<br>
			<h2>Is this you?</h2> <br>
			<form method="post">
				Username: <?php echo $_SESSION['resetuser'];?> <br>
				Reset Code: <?php echo $_SESSION['resetcode'];?> <br>
				Enter your new password: <input type="text" name="newpass" placeholder="New Password"> <br>
				<button class="btn btn-success" type="submit" name="confirmed">Confirm</button> <br>
			</form>
			<button class="btn btn-danger" type="button" ><a href="reset.php" style="color:#ffffff;">No, this is not me</a></button>
		</p>
	</body>
</html>