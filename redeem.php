<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($con);
$username = $user_data['user_name'];
$query = "select * from users where user_name = '$username' limit 1";
$value;
$result = mysqli_query($con,$query);
if ($result)
{
	if ($result && mysqli_num_rows($result) > 0)
	{
		while ($row = mysqli_fetch_assoc($result))
		{
			$balance = $row['balance'];
			$_SESSION['balance'] = $balance;
			sleep(5);
			if ($value !== null) {
				$newbalance = $_SESSION['balance'] + value;
				$query = "update users set balance = '$newbalance' where user_name = '$username'";
				$result = mysqli_query($con,$query);
				if ($result)
				{
					header("Location: index.php");
				}else{
					echo 'An error occured.';
					sleep(5);
					header("Location: index.php");
				}
			}else{
				echo 'isEmpty = true';
				sleep(4);
				header("Location: index.php");
			}
		}
	}
}
?>