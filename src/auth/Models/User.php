<?php

namespace Auth\Models;

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
        $testname = "potato";
        $testpass = "123123";

        $valid_name = $this->name == $testname;
        $valid_pass = $this->pass == $testpass;

        return $valid_name && $valid_pass;
    }

}


