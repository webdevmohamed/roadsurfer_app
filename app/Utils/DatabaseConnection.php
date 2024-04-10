<?php

require_once 'config.php';
require_once 'vendor/autoload.php';

use Dotenv\Dotenv as Dotenv;

class DatabaseConnection
{

    private mysqli $connection;

    public function __construct()
    {
        echo ROOT_DIR;
        $dotenv = Dotenv::createImmutable(ROOT_DIR);
        $dotenv->load();
        $this->connection = $this->connect();
    }

    private function connect() {
        try {
            $connection = new mysqli($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME'], $_ENV['DB_PORT']);
            if ($connection->connect_error) {
                throw new Exception("Error connecting to the database: " . $connection->connect_error);
            }
            return $connection;
        } catch (Exception $e) {
            throw new Exception("Error connecting to the database: " . $e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }

}