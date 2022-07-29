<?php
session_start();
include("connection.php");
include("functions.php");
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$code = $_POST['code']; // Get code from HTML
	$query = "select * from resetcodes where `code` = '$code' limit 1"; // SQL Query
	$result = mysqli_query($con,$query);
	if ($result) // Check if there is a result
	{
		if ($result && mysqli_num_rows($result) > 0) // Check if the code is valid
		{
			while ($row = mysqli_fetch_assoc($result)) {
				$_SESSION['resetuser'] = $row['user']; // Make the username of the user a SuperGlobal.
				$_SESSION['resetcode'] = $row['code']; // Make the code of the user a SuperGlobal.
			}
			header("Location: resetconfirmation.php"); // Redirect them to a confirmation message.
		}else{
			echo '<script type="text/javascript">alert("Code is invalid.")</script>';
		}
	}else{
		echo '<script type="text/javascript">alert("Code is invalid.")</script>';
	}
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
			<h1>Reset your password</h1> <br>
			<h2>Step One</h2> <br>
			To reset your password, check your email for a reset code, and type it in below. <br>
			<br>
			<h2>Step Two</h2> <br>
			<form method="post">
				Please enter your reset code: <input type="text" name="code" placeholder="Reset Code">
				<button class="btn btn-primary" type="submit" name="submit">Submit Reset Code</button>
			</form>
		</p>
	</body>
</html>
			
