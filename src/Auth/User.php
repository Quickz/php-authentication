<?php

namespace Auth;

/**
 * contains user functionality
 *
 */
class User implements iUser
{

    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function fetchData()
    {
        $data = ['name' => $this->name];
        $sql = "SELECT * FROM users WHERE name=:name";
        $user = Db::query($sql, $data);
        return $user->fetchObject();
    }

    public function insertData($pass)
    {
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $data = ['name' => $this->name, 'pass' => $pass];
        $sql = "INSERT INTO users (name, password)
                VALUES (:name, :pass)";

        // name's taken
        if ($this->fetchData())
            return;

        Db::query($sql, $data);
        return true;
    }

}
