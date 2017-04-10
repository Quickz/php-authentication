<?php

require __DIR__.'/../vendor/autoload.php';
use Auth\Auth;

Auth::logout();

header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
