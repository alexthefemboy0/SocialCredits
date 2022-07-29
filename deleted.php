<?php

session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($con);
$user_name = $user_data['user_name'];
if ($user_data['isdeleted'] == 0)
{
	header("Location: index.php");
	die;
}
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$query = "DELETE * FROM `users` WHERE `users`.`user_name` = '$user_name'";
	$result = mysqli_query($con, $query);
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Social Credits - Deleted</title>
					    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        </head>
       	<body>
       		<p style="font-family:verdana">
       			<h1>Account Deleted</h1> <br>
       			<br>
       			Your user has been deleted for violating our terms of service. If you believe this ban can be justified or reversed, please contact customer support at socialcreditswoodward@hotmail.com . <br> Your data will be deleted when you click Logout. <br>
				<form type="post">
       				<button class="btn btn-danger" type="submit" name="hasclicked">Logout</button>
				</form>
       		</p>
       	</body>
	</html>