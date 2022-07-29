<?php

session_start();

if (isset($_SESSION['user_id'])) // Check if session is set
{
	unset($_SESSION['user_id']); // Unset session
}
header("Location: login.php"); // Redirect to login page
die; // die hard