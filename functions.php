<?php

function check_login($con)
{
	if (isset($_SESSION['user_id']))
	{
		// Bunch of sphagetti
		$id = $_SESSION['user_id'];
		$query = "select * from users where user_id = '$id' limit 1";
		$result = mysqli_query($con, $query);
		if ($result && mysqli_num_rows($result) > 0)
		{
			$user_data = mysqli_fetch_assoc($result);
			if ($user_data['isbanned'] == 1)
			{
				header("Location: banned.php");
				die;
			}
			if($user_data['isdeleted'] == 1)
			{
				header("Location: deleted.php");
				die;
			}
			return $user_data;
		}
	}
	// Redirect to login
	header("Location: login.php");
	die;
}

function random_num($length)
{ // Some simple maths below.
	$text = "";
	if ($length < 5)
	{
		$length = 5;
	}
	$len = rand(4,$length);
	
	for ($i=0; $i < $len; $i++)
	{
		#code...
		
		$text .= rand(0,9);
	}
	return text;
}

function checkBan()
{
	$user_data = check_login($con);
	$isbanned = $user_data['isbanned'];
	if ($isbanned == 1)
	{
		return true;
	}else
	{
		return false;
	}
}
function checkDeleted()
{
	$user_data = check_login($con);
	$isdeleted = $user_data['isdeleted'];
}

?>