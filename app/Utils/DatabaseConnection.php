<?php

require_once 'config/config.php';

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
                error_log("Error connecting to the database: " . $connection->connect_error);
               }
            return $connection;
        } catch (Exception $e) {
            error_log("Error connecting to the database: " . $e->getMessage());
            return null;
        }

    }

    /**
     * Returns the database connection
     * @return mysqli|null
     */
    public function getConnection()
    {
        return $this->connection;
    }

}