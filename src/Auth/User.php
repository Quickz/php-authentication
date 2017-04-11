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
        $name = "'" . $this->name . "'";
        $user = Db::query("SELECT * FROM users WHERE name=$name");
        return $user->fetchObject();
    }

    public function insertData($pass)
    {
        $name = $this->addQuotes($this->name);
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $pass = $this->addQuotes($pass);

        // name's taken
        if ($this->fetchData())
            return;

        Db::query("INSERT INTO users (name, password)
                        VALUES ($name, $pass)");
        return true;
    }

    private function addQuotes($str)
    {
        return "'" . $str . "'";
    }

}
