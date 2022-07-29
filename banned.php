<?php
include("connection.php");
include("functions.php");
$user_data = check_login($con);
if ($user_data['isbanned'] == 0)
{
       header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Social Credits - Banned</title>
					    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        </head>
       	<body>
       		<p style="font-family:verdana">
       			<h1>Account Banned</h1> <br>
       			<br>
       			Your user has been banned for violating our terms of service. If you believe this ban can be justified or reversed, please contact customer support at socialcreditswoodward@hotmail.com. <br>
                            Your data is safe. <br>
                            Ban reason: <?php echo $user_data['reason'];?>
                            
                            
       			<button class="btn btn-danger"><a href="logout.php" style="color:#ffffff;">Logout</a></button>
       		</p>
       	</body>
	</html>