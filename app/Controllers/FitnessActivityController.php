<?php

require_once 'app/Models/FitnessActivityModel.php';

class FitnessActivityController
{

    private function responseJSON($response)
    {
        echo json_encode($response);
    }


    public function getFilteredActivities()
    {
        try {
            $selectedTypeId = $_POST['ActivityTypeId'] ?? null;
            if (!$selectedTypeId || !is_numeric($selectedTypeId)) {
                http_response_code(400);
                exit();
            }

            $fitnessActivityModel = new FitnessActivityModel();
            $filteredActivities = $fitnessActivityModel->getActivitiesByTypeId($selectedTypeId);

            if (empty($filteredActivities)) {
                http_response_code(404);
                exit();
            }

            $this->responseJSON($filteredActivities);

        } catch (Exception $e) {
            http_response_code(500);
        }

    }


    public function getDistanceAccumulated()
    {
        try {
            $selectedTypeId = $_POST['ActivityTypeId'] ?? null;
            if (!$selectedTypeId || !is_numeric($selectedTypeId)) {
                http_response_code(400);
                exit();
            }

            $fitnessActivityModel = new FitnessActivityModel();
            $distanceAcumulated = $fitnessActivityModel->getDistanceAccumulatedByTypeId($selectedTypeId);

            $this->responseJSON(['distanceAccumulated' => $distanceAcumulated]);

        } catch (Exception $e) {
            http_response_code(500);
        }

    }

    public function getTotalElapsedTime()
    {
        try {
            $selectedTypeId = $_POST['ActivityTypeId'] ?? null;
            if (!$selectedTypeId || !is_numeric($selectedTypeId)) {
                http_response_code(400);
                exit();
            }

            $fitnessActivityModel = new FitnessActivityModel();
            $totalElapsedTime = $fitnessActivityModel->getTotalElapsedTimeByTypeId($selectedTypeId);

            $this->responseJSON(['totalElapsedTime' => $totalElapsedTime]);

        } catch (Exception $e) {
            http_response_code(500);
        }

    }


}