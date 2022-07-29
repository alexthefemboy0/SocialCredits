<?php
session_start();
include("connection.php");
include("functions.php");
use PHPMailer\PHPMailer\PHPMailer;

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
	$user_name = $_POST['username']; 
	$query = "select * from users where user_name = '$user_name' limit 1"; // Sql Query
	$result = mysqli_query($con,$query);
	if ($result)
	{
		if ($result && mysqli_num_rows($result) > 0)
		{
			while ($row = mysqli_fetch_assoc($result)) {
				$email = $row['email'];
				$username = $row['user_name'];
				$code = rand(100000, 999999);
				$query = "insert into resetcodes (code,user) values ('$code','$username')";
				mysqli_query($con,$query);
				// SEND MAIL START
				require_once "PHPMailer/PHPMailer.php";
				require_once "PHPMailer/SMTP.php";
				require_once "PHPMailer/Exception.php";
				$mail = new PHPMailer();

				// Settings
				$mail->IsSMTP();	
				$mail->Host       = "smtp.office365.com"; 
				$mail->SMTPAuth   = true;                  // enable SMTP authentication
				$mail->Port       = 587;                    // set the SMTP port for the GMAIL server
				$mail->Username   = "socialcreditswoodward@hotmail.com";            // SMTP account username example
				$mail->Password   = "SocialCreditsPHP";            // SMTP account password example
				$mail->SMTPSecure = "STARTTLS";
				// Content
				$mail->isHTML(true);    	// Set email format to HTML
				$mail->setFrom($email);
				$mail->addAddress("socialcreditswoodward@hotmail.com");
				$mail->Subject = 'Account Password Reset';
				$mail->Body    = 'You have recieved this email because you have submitted a password change request. If you did not make this request, please ignore this email. If you did, your reset code is '.$code.'. Do not share this code with anyone else or you risk your account being stolen. Have a good day.';
				$mail->AltBody = 'You have recieved this email because you have submitted a password change request. If you did not make this request, please ignore this email. If you did, your reset code is '.$code.'. Do not share this code with anyone else or you risk your account being stolen. Have a good day.';
				$mail->send();
				// SEND MAIL END
				header("Location: reset.php");
			}	
		}	
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
		<script src="https://smtpjs.com/v3/smtp.js"></script>
		<title>Verify Your Email</title>
	</head>
	<body>
		<p style="font-family:verdana">
			<h1>Verify your email</h1> <br>
			<br>
			Please input your username so we can send a reset code to you. <br>
			<form method="post">
				<input type="text" name="username" placeholder="Your Username"> <br>
				<button class="btn btn-success" type="submit">Send Email</button>
			</form>
		</p>
	</body>
</html>