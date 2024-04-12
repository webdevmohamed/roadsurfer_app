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


    public function filterActivities()
    {
        try {
            $protocol = ($_SERVER['SERVER_PROTOCOL'] ?? 'HTTP/1.0');
            $selectedTypeId = $_POST['ActivityTypeId'];
            if ($selectedTypeId === '' || !is_numeric($selectedTypeId)) {
                http_response_code(400);
                header($protocol . ' 400 The value sent to perform the filter is not valid, please try again later');
                exit();
            }

            $fitnessActivityModel = new FitnessActivityModel();
            $filteredActivities = $fitnessActivityModel->getActivitiesByTypeId($selectedTypeId);

            if (empty($filteredActivities)) {
                header($protocol . ' 404 There are no fitness activities belonging to the selected activity type');
                exit();
            }

            echo json_encode($filteredActivities);
        } catch (Exception $e) {
            header($protocol . ' 500 Oops, something went wrong in the server, please try again later');
        }

    }


}