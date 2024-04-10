<?php

require 'app/Utils/DatabaseConnection.php';
require 'app/Entities/FitnessActivity.php';

class FitnessActivityModel
{

    private $connection;

    public function __construct()
    {
        $databaseConnection = new DatabaseConnection();
        $this->connection = $databaseConnection->getConnection();
    }

    public function getAll()
    {
        $sql = "SELECT f.id, a.name as activity_type, f.activity_date, f.name, f.distance, f.distance_unit, f.elapsed_time 
                FROM fitness_activities f, activity_types a
                WHERE f.activity_type_id = a.id";
        $result = $this->connection->query($sql);
        $fitness_activities = [];
        while ($row = $result->fetch_assoc()) {
            $actividad = new FitnessActivity();
            $actividad->setId($row['id']);
            $actividad->setActivityType($row['activity_type']);
            $actividad->setActivityDate($row['activity_date']);
            $actividad->setName($row['name']);
            $actividad->setDistance($row['distance']);
            $actividad->setDistanceUnit($row['distance_unit']);
            $actividad->setElapsedTime($row['elapsed_time']);
            $fitness_activities[] = $actividad;
        }
        return $fitness_activities;
    }


}