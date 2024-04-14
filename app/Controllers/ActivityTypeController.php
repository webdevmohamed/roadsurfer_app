<?php
require_once 'app/Models/ActivityTypeModel.php';

class ActivityTypeController
{

    public function addActivityType()
    {
        $activityTypeName = $_POST['activity-type-name'] ?? null;
        if (!$activityTypeName || empty(trim($activityTypeName))) {
            $_SESSION['addActivityTypeMessage'] = 'Please enter a valid Activity Type name.';
            $_SESSION['addActivityTypeAlertClass'] = 'danger';
        } else {
            $activityTypesModel = new ActivityTypeModel();
            $alreadyAdded = $activityTypesModel->doesActivityTypeExists($activityTypeName, 'name');
            if (!$alreadyAdded) {
                if ($activityTypesModel->addActivityType($activityTypeName)) {
                    $_SESSION['addActivityTypeMessage'] = 'The Activity Type has been added correctly.';
                    $_SESSION['addActivityTypeAlertClass'] = 'success';
                } else {
                    $_SESSION['addActivityTypeMessage'] = 'Something went wrong, please try again later.';
                    $_SESSION['addActivityTypeAlertClass'] = 'danger';
                }
            } else {
                $_SESSION['addActivityTypeMessage'] = 'The Activity Type entered was already added.';
                $_SESSION['addActivityTypeAlertClass'] = 'warning';
            }
        }

        header("Location: {$_SERVER['HTTP_REFERER']}#add-activity-type" );
        exit();
    }

}