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
			self::safeSessionStart();
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
		self::safeSessionStart();
		session_unset();
		session_destroy();
	}

	public static function isLogged()
	{
		self::safeSessionStart();
		return isset($_SESSION['user']);
	}

	public static function getUser()
	{
		self::safeSessionStart();
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
    	$valid_name = preg_match('/^[a-zA-Z0-9]{3,25}$/', $name);
		$valid_pass = preg_match('/^.{8,50}$/', $name);

    	if (!$valid_name && !$valid_pass)
    	{
    		self::addWarning('Invalid name or password.');
    		return false;
    	}

    	$user = new User($name);

    	// name's taken
        if ($user->fetchData())
        {
        	self::addWarning('The current name\'s already in use.');
            return false;
        }

    	$status = $user->insertData($pass);
    	return $status;
    }

    private static function addWarning($message)
    {
    	self::safeSessionStart();
    	$_SESSION['warning'] = $message;
    }
    
    public static function hasWarning()
    {
    	self::safeSessionStart();
    	return isset($_SESSION['warning']);
    }

    public static function getWarning()
    {
    	self::safeSessionStart();
    	$message = $_SESSION['warning'];
    	unset($_SESSION['warning']);
    	return $message;
    }

    private static function safeSessionStart()
    {
    	if (session_status() == PHP_SESSION_NONE)
    		session_start();
    }

}
