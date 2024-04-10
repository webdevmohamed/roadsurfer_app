<?php
ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

require_once 'vendor/autoload.php';
use Dotenv\Dotenv as Dotenv;

echo realpath('.\\');
echo realpath('./');
echo realpath('../');
echo realpath('/');

$dotenv = Dotenv::createImmutable(realpath('./'));
$dotenv->load();
