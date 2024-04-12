<?php

require_once 'app/Utils/DatabaseConnection.php';
require 'app/Entities/ActivityType.php';

class ActivityTypeModel
{

    private $connection;

    public function __construct()
    {
        $databaseConnection = new DatabaseConnection();
        $this->connection = $databaseConnection->getConnection();
    }

    public function getAllActivityTypes()
    {
        $sql = "SELECT * from activity_types";
        $result = $this->connection->query($sql);
        $activityTypes = [];
        while ($row = $result->fetch_assoc()) {
            $activityType= new ActivityType();
            $activityType->setId($row['id']);
            $activityType->setName($row['name']);
            $activityTypes[] = $activityType;
        }
        return $activityTypes;
    }

}