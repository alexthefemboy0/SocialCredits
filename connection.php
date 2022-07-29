<?php

$dbhost = "localhost";
$dbuser = "1145959";
$dbpass = "SocialCreditsPHP";
$dbname = "1145959";

if (!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname))
{
	die("Critical error connecting to phpMyAdmin");
}

?>