<?php

require __DIR__.'/../vendor/autoload.php';
use Auth\Models\Auth;

Auth::logout();

header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
