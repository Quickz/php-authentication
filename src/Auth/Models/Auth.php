<?php

namespace Auth\Models;

/**
 * contains all authentication
 * related fuctionality
 */
class Auth
{

	public static function login($username, $password)
	{
		$user = new User($username);

		if (Auth::validateData($username, $password, $user))
		{
			session_start();
			$_SESSION['user'] = $user;
			return true;
		}
		else
		{
			return false;
		}
	}

	public static function logout()
	{
		session_start();
		session_unset();
		session_destroy();
	}

	public static function isLogged()
	{
		session_start();
		if (isset($_SESSION['user']))
			return true;
		else
		{
			session_destroy();
			return false;
		}
	}

	public static function getUser()
	{
		return $_SESSION['user'];
	}

    private static function validateData($name, $pass, $userObj)
    {
        $user = $userObj->fetchData();
        
        $valid_name = $name == $user->name;
        $valid_pass = password_verify($pass, $user->password);

        return $valid_name && $valid_pass;
    }

}
