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
        return $this->getActivities($sql);
    }

    public function getActivitiesByTypeId($typeId)
    {
        $sql = "SELECT f.id, a.name as activity_type, f.activity_date, f.name, f.distance, f.distance_unit, f.elapsed_time 
                FROM fitness_activities f, activity_types a
                WHERE f.activity_type_id = a.id and a.id = " . $typeId;
        return $this->getActivities($sql);
    }

    public function getDistanceAccumulatedByTypeId($selectedTypeId)
    {
        $filteredActivities = $this->getActivitiesByTypeId($selectedTypeId);
        if (empty($filteredActivities)) {
            http_response_code(404);
            exit();
        }

        $conversionFactors = [
            'm' => 1/1000,
            'dam' => 1/100,
            'hm' => 1/10,
            'km' => 1,
        ];

        $distanceAccumulatedKm = 0;

        foreach ($filteredActivities as $activity) {
            $distance = $activity->getDistance();
            $distanceUnit = $activity->getDistanceUnit();

            if (isset($conversionFactors[$distanceUnit])) {
                $factor = $conversionFactors[$distanceUnit];
                $distanceMeters = $distance * $factor;
                $distanceAccumulatedKm += $distanceMeters;
            } else {
                // Unrecognized distance unit among the filtered activities
                http_response_code(400);
                exit();
            }
        }

        return round($distanceAccumulatedKm, 3);
    }


    private function getActivities($sql)
    {
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