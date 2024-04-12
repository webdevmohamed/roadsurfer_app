<?php
//ini_set('display_errors', 1);

//ini_set('display_startup_errors', 1);

//error_reporting(E_ALL);

use Dotenv\Dotenv as Dotenv;
require_once 'vendor/autoload.php';

if (file_exists('./.env')) {
    $dotenv = Dotenv::createImmutable('./');
    $dotenv->load();
}
