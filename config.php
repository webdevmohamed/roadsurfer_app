<?php
require_once 'vendor/autoload.php';
use Dotenv\Dotenv as Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
