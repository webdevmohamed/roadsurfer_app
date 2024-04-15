<?php
use Dotenv\Dotenv as Dotenv;
require_once 'vendor/autoload.php';

// Loads the .env file only if exists
if (file_exists('./.env')) {
    $dotenv = Dotenv::createImmutable('./');
    $dotenv->load();
}
