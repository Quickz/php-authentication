<?php

namespace Auth\Models;
require "db.php";

/**
 * contains user functionality
 *
 */
class User
{

    private $name;
    private $pass;

    public function __construct($name, $pass)
    {
        $this->name = $name;
        $this->pass = $pass;
    }

    public function getName()
    {
        return $this->name;
    }

    public function validateData()
    {
        $user = $this->fetchData();
        
        $valid_name = $this->name == $user->name;
        $valid_pass = password_verify($this->pass, $user->password);

        return $valid_name && $valid_pass;
    }

    public function fetchData()
    {
        $user = db::query("SELECT * FROM users WHERE name='potato'");
        return $user;
    }

}
