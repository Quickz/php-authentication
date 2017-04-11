<?php

require __DIR__.'/../../vendor/autoload.php';
use Auth\Auth;

if (isset($_POST['username']) && isset($_POST['password']))
{
	$username = htmlspecialchars($_POST['username']);
	$password = htmlspecialchars($_POST['password']);
	Auth::login($username, $password);
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
