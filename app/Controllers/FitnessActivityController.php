<?php

require_once 'app/Models/FitnessActivityModel.php';
require 'app/Models/ActivityTypeModel.php';

class FitnessActivityController
{

    public function index()
    {
        $fitnessActivityModel = new FitnessActivityModel();
        $fitnessActivities = $fitnessActivityModel->getAllFitnessActivities();

        $activityTypesModel = new ActivityTypeModel();
        $acticityTypes = $activityTypesModel->getAllActivityTypes();


        require 'app/Views/index.view.php';
    }

    private function responseJSON($response)
    {
        echo json_encode($response);
    }


    public function getFilteredActivities()
    {
        try {
            $selectedTypeId = $_POST['ActivityTypeId'];
            if ($selectedTypeId === '' || !is_numeric($selectedTypeId)) {
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
            $selectedTypeId = $_POST['ActivityTypeId'];
            if ($selectedTypeId === '' || !is_numeric($selectedTypeId)) {
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


}