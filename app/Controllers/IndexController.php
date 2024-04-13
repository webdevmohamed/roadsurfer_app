<?php

require_once 'app/Models/FitnessActivityModel.php';
require_once 'app/Models/ActivityTypeModel.php';

class IndexController
{
    public function index()
    {
        $fitnessActivityModel = new FitnessActivityModel();
        $fitnessActivities = $fitnessActivityModel->getAllFitnessActivities();

        $activityTypesModel = new ActivityTypeModel();
        $acticityTypes = $activityTypesModel->getAllActivityTypes();

        require 'app/Views/index.view.php';
    }

    public function create()
    {
        $activityTypesModel = new ActivityTypeModel();
        $acticityTypes = $activityTypesModel->getAllActivityTypes();

        require 'app/Views/create.view.php';
    }




}