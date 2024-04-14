<?php

require_once 'app/Models/FitnessActivityModel.php';
require_once 'app/Models/ActivityTypeModel.php';

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
            $filteredActivities = $fitnessActivityModel->getActivitiesByTypeId((int)$selectedTypeId);

            if (empty($filteredActivities)) {
                http_response_code(404);
                exit();
            }

            $this->responseJSON($filteredActivities);

        } catch (Exception $e) {
            error_log($e->getMessage());
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
            $distanceAcumulated = $fitnessActivityModel->getDistanceAccumulatedByTypeId((int)$selectedTypeId);

            $this->responseJSON(['distanceAccumulated' => $distanceAcumulated]);

        } catch (Exception $e) {
            error_log($e->getMessage());
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
            $totalElapsedTime = $fitnessActivityModel->getTotalElapsedTimeByTypeId((int)$selectedTypeId);

            $this->responseJSON(['totalElapsedTime' => $totalElapsedTime]);

        } catch (Exception $e) {
            error_log($e->getMessage());
            http_response_code(500);
        }

    }

    public function addFitnessActivity()
    {
        try {

            $activityTypeId = $_POST['activity-type'] ?? null;
            $activityDate = $_POST['activity-date'] ?? null;
            $activityName = $_POST['activity-name'] ?? null;
            $distance = $_POST['distance'] ?? null;
            $distanceUnit = $_POST['distance-unit'] ?? null;
            $elapsedTime = $_POST['elapsed-time'] ?? null;

            if (!$activityTypeId || !$activityDate || !$activityName || !$distance || !$distanceUnit || !$elapsedTime) {
                $_SESSION['addFitnessActivityMessage'] = 'Please fill in all required fields.';
                $_SESSION['addFitnessActivityAlertClass'] = 'danger';
                header("Location: {$_SERVER['HTTP_REFERER']}");
                exit();
            }

            $activityTypesModel = new ActivityTypeModel();
            $exists = $activityTypesModel->doesActivityTypeExists($activityTypeId, 'id');

            if (!$exists) {
                $_SESSION['addFitnessActivityMessage'] = 'Please select a valid Activity Type.';
                $_SESSION['addFitnessActivityAlertClass'] = 'danger';
                header("Location: {$_SERVER['HTTP_REFERER']}");
                exit();
            }

            if (!strtotime($activityDate) || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $activityDate)
                || $activityDate > date('Y-m-d')
                || $activityDate < date('Y-m-d', 0)) {
                $_SESSION['addFitnessActivityMessage'] = 'Please enter a valid Activity Date in the format YYYY-MM-DD.';
                $_SESSION['addFitnessActivityAlertClass'] = 'danger';
                header("Location: {$_SERVER['HTTP_REFERER']}");
                exit();
            }

            if (empty(trim($activityName))) {
                $_SESSION['addFitnessActivityMessage'] = 'Please enter a valid Activity Name.';
                $_SESSION['addFitnessActivityAlertClass'] = 'danger';
                header("Location: {$_SERVER['HTTP_REFERER']}");
                exit();
            }

            if (!is_numeric($distance) || $distance <= 0) {
                $_SESSION['addFitnessActivityMessage'] = 'Please enter a valid Distance.';
                $_SESSION['addFitnessActivityAlertClass'] = 'danger';
                header("Location: {$_SERVER['HTTP_REFERER']}");
                exit();
            }

            $validDistanceUnits = ['m', 'dam', 'hm', 'km'];
            if (!in_array($distanceUnit, $validDistanceUnits)) {
                $_SESSION['addFitnessActivityMessage'] = 'Please select a valid Distance Unit.';
                $_SESSION['addFitnessActivityAlertClass'] = 'danger';
                header("Location: {$_SERVER['HTTP_REFERER']}");
                exit();
            }

            if (!strtotime($elapsedTime) || !preg_match('/^\d{2}:\d{2}(:\d{2})?$/', $elapsedTime)) {
                $_SESSION['addFitnessActivityMessage'] = 'Please enter a valid Elapsed Time in the format HH:MM:SS.';
                $_SESSION['addFitnessActivityAlertClass'] = 'danger';
                header("Location: {$_SERVER['HTTP_REFERER']}");
                exit();
            }

            if (!preg_match('/^\d{2}:\d{2}:\d{2}$/', $elapsedTime)) {
                $elapsedTime .= ':00';
            }

            $fitnessActivityModel = new FitnessActivityModel();
            $fitnessActivity = new FitnessActivity();
            $fitnessActivity->setActivityType($activityTypeId);
            $fitnessActivity->setActivityDate($activityDate);
            $fitnessActivity->setName($activityName);
            $fitnessActivity->setDistance((float)$distance);
            $fitnessActivity->setDistanceUnit($distanceUnit);
            $fitnessActivity->setElapsedTime($elapsedTime);

            if ($fitnessActivityModel->addFitnessActivity($fitnessActivity)) {
                $_SESSION['addFitnessActivityMessage'] = 'The Fitness Activity has been added correctly.';
                $_SESSION['addFitnessActivityAlertClass'] = 'success';
            } else {
                $_SESSION['addFitnessActivityMessage'] = 'Something went wrong, please try again later.';
                $_SESSION['addFitnessActivityAlertClass'] = 'danger';
            }

        } catch (Exception $e) {
            $_SESSION['addFitnessActivityMessage'] = 'Something went wrong with the server, please try again later.';
            $_SESSION['addFitnessActivityAlertClass'] = 'danger';
            error_log($e->getMessage());
            http_response_code(500);
        }

        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    }


}