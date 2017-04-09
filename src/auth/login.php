<?php

require __DIR__.'/../../vendor/autoload.php';
use Auth\Models\User;

$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);

$user = new User($username, $password);

if ($user->validateData())
{
	session_start();
	$_SESSION['user'] = $user;
	echo "valid";
}
else
{
	echo "invalid";
}
