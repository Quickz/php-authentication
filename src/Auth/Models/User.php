<?php

namespace Auth\Models;

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
        $user = db::query("SELECT * FROM users WHERE name=$name");
        return $user;
    }

}
