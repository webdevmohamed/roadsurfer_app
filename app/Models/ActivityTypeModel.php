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
        $sql = "SELECT * FROM activity_types";
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

    public function isActivityTypeAlreadyAdded($activityTypeName)
    {
        $escapedActivityTypeName = $this->connection->real_escape_string($activityTypeName);
        $sql = "SELECT COUNT(*) AS count FROM activity_types WHERE name = '$escapedActivityTypeName'";
        $result = $this->connection->query($sql);
        $row = $result->fetch_assoc();
        return $row['count'] > 0;
    }


    public function  addActivityTypeByName($activityTypeName)
    {
        $escapedActivityTypeName = $this->connection->real_escape_string($activityTypeName);
        $sql = "INSERT INTO activity_types (name) VALUES ('$escapedActivityTypeName')";
        if ($this->connection->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

}