<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($con);
// Check for chat submittance
if ($_SERVER['REQUEST_METHOD'] == "POST")
{
	$touser = $_POST['recipient'];
	$username = $user_data['user_name'];
	$message = $_POST['message'];
	$query = "insert into chat (to_user,from_user,message) values ('$recipient','$username','$message')";
	$result = mysqli_query($con,$query);
	if ($result) {
		
	}else{
		echo '<script type="text/javascript>alert("There was a problem sending your message")</script>';
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Social Credits - Chat</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	</head>
	<body>
		<p style="font-family:verdana">
			<h1>Chat</h1> <br> <br>
				
			<form method="post">
				<input type="text" name="recipient" placeholder="Chat to User"> <br>
				<input type="text" name="message" placeholder="Message"> <br>
				<button type="submit" class="btn btn-success">Send user message</button> <br>
				Warning: All messages sent are logged in our database for moderation purposes and can be read by admins; refrain from sending inappropriate or offensive messages, as it can lead to in school and/or account punishments. <br> <br> <br>
			</form>
		</p>
	</body>
</html>