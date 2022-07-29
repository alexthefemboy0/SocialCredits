<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($con);
$user_name = $user_data['user_name'];
$value = 100000;
$query = "select * from users where user_name = '$user_name' limit 1";
$result = mysqli_query($con,$query);
if ($result)
{
	if ($result && mysqli_num_rows($result) > 0) 
	{
		while ($row = mysqli_fetch_assoc($result)) {
			$balance = $row['balance'];
			$_SESSION['currentbalance'] = $balance;
		}
	}
	$newbalance = $_SESSION['currentbalance'] + $value;
	$queryadd = "update users set balance = '$newbalance' where user_name = '$user_name'";
	$newresult = mysqli_query($con,$queryadd);
	if ($newresult)
	{
		echo '<script type="text/javascript">alert("You have successfully redeemed your Social Credits!")';
		header("Location: index.php");
	}else
	{
		echo '<script type="text/javascript">alert("Your Social credits have not been redeemed due to an error. Please contact Customer Support to redeem your Social Credits.")';
	}
}else
{
	echo '<script type="text/javascript">alert("Failed.")';
}
?>