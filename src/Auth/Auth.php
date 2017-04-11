<?php

namespace Auth;

/**
 * contains all authentication
 * related fuctionality
 */
class Auth
{

	public static function login($username, $password)
	{
		$user = new User($username);

		if (self::verifyData($user, $password))
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

    private static function verifyData($user_obj, $pass)
    {
        $user = $user_obj->fetchData();

        // user doesn't exist
        if (!$user) return false;

        return password_verify($pass, $user->password);
    }

    public static function createUser($name, $pass)
    {
    	$user = new User($name);
    	$status = $user->insertData($pass);
    	return $status;
    }
    
}
