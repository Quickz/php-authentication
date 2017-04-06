<?php

$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);

$testname = "potato";
$testpass = "123123";

if ($username == $testname && $password == $testpass)
{
	session_start();
	$_SESSION['username'] = $username;
	$_SESSION['password'] = $password;
	echo "valid";
}
else
{
	echo "invalid";	
}


