<?php

require_once 'app/Utils/DatabaseConnection.php';
require 'app/Entities/FitnessActivity.php';

class FitnessActivityModel
{

    private $connection;

    public function __construct()
    {
        $databaseConnection = new DatabaseConnection();
        $this->connection = $databaseConnection->getConnection();
    }

    public function getAllFitnessActivities()
    {
        $sql = "SELECT f.id, a.name as activity_type, f.activity_date, f.name, f.distance, f.distance_unit, f.elapsed_time 
                FROM fitness_activities f, activity_types a
                WHERE f.activity_type_id = a.id";
        $result = $this->connection->query($sql);
        $fitnessActivities = [];
        while ($row = $result->fetch_assoc()) {
            $activity = new FitnessActivity();
            $activity->setId((int)$row['id']);
            $activity->setActivityType($row['activity_type']);
            $activity->setActivityDate($row['activity_date']);
            $activity->setName($row['name']);
            $activity->setDistance((float)$row['distance']);
            $activity->setDistanceUnit($row['distance_unit']);
            $activity->setElapsedTime($row['elapsed_time']);
            $fitnessActivities[] = $activity;
        }
        return $fitnessActivities;
    }

    public function getActivitiesByTypeId($typeId)
    {
        $sql = "SELECT f.id, a.name as activity_type, f.activity_date, f.name, f.distance, f.distance_unit, f.elapsed_time 
                FROM fitness_activities f, activity_types a
                WHERE f.activity_type_id = a.id and a.id = " . $typeId;
        $result = $this->connection->query($sql);
        $fitnessActivities = [];
        while ($row = $result->fetch_assoc()) {
            $activity = new FitnessActivity();
            $activity->setId((int)$row['id']);
            $activity->setActivityType($row['activity_type']);
            $activity->setActivityDate($row['activity_date']);
            $activity->setName($row['name']);
            $activity->setDistance((float)$row['distance']);
            $activity->setDistanceUnit($row['distance_unit']);
            $activity->setElapsedTime($row['elapsed_time']);
            $fitnessActivities[] = $activity;
        }
        return $fitnessActivities;
    }


}