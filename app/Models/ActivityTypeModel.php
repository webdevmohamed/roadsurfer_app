<?php

require_once 'app/Utils/DatabaseConnection.php';
require_once 'app/Entities/ActivityType.php';

class ActivityTypeModel
{

    private $connection;

    /**
     * Establishes the connection with the database
     */
    public function __construct()
    {
        $databaseConnection = new DatabaseConnection();
        $this->connection = $databaseConnection->getConnection();
    }

    /**
     * Returns array of all the Activity Types
     * @return array
     */
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

    /**
     * Returns true or false depending on whether or not it finds the Activity Type with the value assigned to the field
     * @param $value
     * @param $field
     * @return bool
     */
    public function doesActivityTypeExists($value, $field)
    {
        if (is_numeric($value)) {
            $condition = "$field = $value";
        } else {
            $escapedValue = $this->connection->real_escape_string($value);
            $condition = "$field = '$escapedValue'";
        }

        $sql = "SELECT COUNT(*) AS count FROM activity_types WHERE $condition";
        $result = $this->connection->query($sql);
        $row = $result->fetch_assoc();
        return $row['count'] > 0;
    }

    /**
     * Adds a new Activity Type to the database.
     * @param $activityTypeName
     * @return bool
     */
    public function addActivityType($activityTypeName)
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