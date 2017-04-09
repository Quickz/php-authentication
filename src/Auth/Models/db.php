<?php

namespace Auth\Models;
use PDO;

/**
 * contains methods for communicating
 * with the database
 */
class db
{

	private static function conn()
	{
		$config = require 'config.php';

		try
		{
			$conn = new PDO(
				"mysql:host=$config->host;".
				"dbname=$config->database",
				$config->user,
				$config->password
			);

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return $conn;
		}
		catch (PDOException $e)
		{
			die('Connection failed: ' . $e->getMessage());
		}
	}

	public static function query($string)
	{
		$pdo = db::conn();

		$stmt = $pdo->prepare($string);
		$stmt->execute();

		return $stmt->fetchObject();
	}

}