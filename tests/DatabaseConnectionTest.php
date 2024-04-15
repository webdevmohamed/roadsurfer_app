<?php

use PHPUnit\Framework\TestCase;

require_once 'app/Utils/DatabaseConnection.php';

class DatabaseConnectionTest extends TestCase
{

    /**
     * Test that the connection returned is not null
     */
    public function testConnectionNotNull()
    {
        $connection = new DatabaseConnection();
        $this->assertNotNull($connection->getConnection());
    }

    /**
     * Test that the connection returned is an instance of mysqli
     */
    public function testConnectionInstanceOfMysqli()
    {
        $connection = new DatabaseConnection();
        $this->assertInstanceOf(mysqli::class, $connection->getConnection());
    }

}
