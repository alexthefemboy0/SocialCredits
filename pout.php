<?php
	session_start();
	include("connection.php");
	include("functions.php");
	$user_data = check_login($con);
	if ($_SESSION['recipient'])
	{
		$recipient = $_SESSION['recipient'];
		$query = "select * from users where user_name = '$recipient'";
		$result = mysqli_query($con,$query);
		if ($result)
		{
			if ($result && mysqli_num_rows($result) > 0)
			{
				while ($row = mysqli_fetch_assoc($result))
				{
					$user_balance = $row['balance'];
					$user_name = $row['user_name'];
					$amount = $_SESSION['amount'];
					$newBalance = $user_balance + $amount;
					$query = "update users set balance = '$newBalance' where user_name = '$user_name'";
					$result = mysqli($con,$query);
					if ($result)
					{
						echo '<script type="text/javascript">alert("User has been paid!")</script>';
						header("Location: index.php");
					}else
					{
						echo '<script type="text/javascript">alert("Failed to pay user.")</script>';
						header("Location: index.php");
					}
				}
			}else
			{
				echo '<script type="text/javascript">alert("User does not exist.")</script>';
				header("Location: index.php");
			}
		}else
		{
			echo '<script type="text/javascript">alert("Failed to get a row from data server.")</script>';
			header("Location: index.php");
		}
	}else
	{
		echo '<script type="text/javascript">alert("Failed to get a result from data server.")</script>';
		header("Location: index.php");
	}
?>