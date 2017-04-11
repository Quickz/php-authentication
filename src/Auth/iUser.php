<?php

namespace Auth;

interface iUser
{
    public function getName();
    public function fetchData();
    public function insertData($pass);
}
