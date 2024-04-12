<?php

class DatabaseConnection
{

    private mysqli $connection;

    public function __construct()
    {
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
            echo $e->getMessage();
            throw new Exception("Error connecting to the database: " . $e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }

}