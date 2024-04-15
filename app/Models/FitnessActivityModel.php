<?php

require_once 'app/Utils/DatabaseConnection.php';
require_once 'app/Utils/DateTimeFormater.php';
require_once 'app/Entities/FitnessActivity.php';

class FitnessActivityModel
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
     * Returns array of all the Fitness Activities
     * @return array
     */
    public function getAllFitnessActivities()
    {
        $sql = "SELECT f.id, a.name AS activity_type, f.activity_date, f.name, f.distance, f.distance_unit, f.elapsed_time 
                FROM fitness_activities f, activity_types a
                WHERE f.activity_type_id = a.id ORDER BY f.activity_date DESC";
        return $this->getActivities($sql);
    }

    /**
     * Returns array of the Fitness Activities based on a specific Activity Type
     * @param $typeId
     * @return array
     */
    public function getActivitiesByTypeId($typeId)
    {
        $sql = "SELECT f.id, a.name AS activity_type, f.activity_date, f.name, f.distance, f.distance_unit, f.elapsed_time 
                FROM fitness_activities f, activity_types a
                WHERE f.activity_type_id = a.id AND a.id = $typeId ORDER BY f.activity_date DESC";
        return $this->getActivities($sql);
    }

    /**
     *  Returns the accumulated distance for activities of a Activity Type
     * @param $typeId
     * @return float|void
     */
    public function getDistanceAccumulatedByTypeId($typeId)
    {
        $filteredActivities = $this->getActivitiesByTypeId($typeId);
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

    /**
     * Returns the total elapsed time for activities of a Activity Type
     * @param $typeId
     * @return string|void
     */
    public function getTotalElapsedTimeByTypeId($typeId)
    {
        $filteredActivities = $this->getActivitiesByTypeId($typeId);
        if (empty($filteredActivities)) {
            http_response_code(404);
            exit();
        }

        $totalSeconds = 0;
        foreach ($filteredActivities as $activity) {
            $elapsedTime = $activity->getElapsedTime();
            list($hours, $minutes, $seconds) = explode(':', $elapsedTime);
            $activityTotalElapsedTime = (int)($hours * 3600) + (int)($minutes * 60) + (int)$seconds;
            $totalSeconds += $activityTotalElapsedTime;
        }

        $dateTimeFormater = new DateTimeFormater();

        return $dateTimeFormater->secondsToTime($totalSeconds);
    }


    /**
     * Returns Activities based on a sql query
     * @param $sql
     * @return array
     */
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

    /**
     * Adds a new Fitness Activity to the database.
     * @param $fitnessActivity
     * @return bool
     */
    public function addFitnessActivity($fitnessActivity)
    {
        $activityTypeId = $fitnessActivity->getActivityType();
        $activityDate = $fitnessActivity->getActivityDate();
        $activityName = $this->connection->real_escape_string($fitnessActivity->getName());
        $distance = $fitnessActivity->getDistance();
        $distanceUnit = $fitnessActivity->getDistanceUnit();
        $elapsedTime = $fitnessActivity->getElapsedTime();

        $sql = "INSERT INTO fitness_activities (activity_type_id, activity_date, name, distance, distance_unit, elapsed_time) 
        VALUES ($activityTypeId, '$activityDate', '$activityName', $distance, '$distanceUnit', '$elapsedTime')";

        if ($this->connection->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }


}