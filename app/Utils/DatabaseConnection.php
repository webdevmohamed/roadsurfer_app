<?php

require_once 'app/config.php';

class DatabaseConnection
{

    private mysqli $connection;

    public function __construct()
    {
        $this->connection = $this->connect();
    }

    private function connect() {
        try {
            $connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
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