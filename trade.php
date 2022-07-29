<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($con);
if ($_SERVER['REQUEST_METHOD'] == "POST")
{
	$recipient = $_POST['recipuser'];
	$amount = $_POST['tradeamount'];
	$_SESSION['recipient'] = $recipient;
	$_SESSION['tradeamount'] = $amount;
	$username = $user_data['user_name'];
	$balance = $user_data['balance'];
	$newBalance = $balance - $amount;
	if ($balance >= $amount)
	{
		$query = "update users set balance = '$newBalance' where user_name = '$username'";
		$result = mysqli_query($con,$query);
		header("Location: pout.php");
	}else
	{
		echo '<script type="text/javascript">alert("Insufficient funds.")</script>';
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Confirm Trade</title>
		<script>
			
		</script>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	</head>
	<body>
		<p style="font-family:verdana">
			<h1>Trade a user</h1>
			Your username: <?php echo $user_data['user_name'];?> <br>
			<form type="post">
				Please enter the username you would like to trade to confirm this trade: <input type="text" placeholder="Recipient Username" 				name="recipuser"> <br>
				Please enter your trade amout in Social Credits: <input type="text" placeholder="Trade Amount" name="tradeamount"> <br>
				<button type="submit" class="btn btn-success">Trade this user</button>
			</form>
		</p>
	</body>
</html>
				
			