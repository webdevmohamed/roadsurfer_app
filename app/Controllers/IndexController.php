<?php

require_once 'app/Models/FitnessActivityModel.php';
require_once 'app/Models/ActivityTypeModel.php';

class IndexController
{
    /**
     * Defines the data required for the index view and displays it on screen
     */
    public function index()
    {
        $fitnessActivityModel = new FitnessActivityModel();
        $fitnessActivities = $fitnessActivityModel->getAllFitnessActivities();

        $activityTypesModel = new ActivityTypeModel();
        $acticityTypes = $activityTypesModel->getAllActivityTypes();

        include 'app/Views/index.view.php';
    }

    /**
     * Defines the data required for the create view and displays it on screen
     */
    public function create()
    {
        $activityTypesModel = new ActivityTypeModel();
        $acticityTypes = $activityTypesModel->getAllActivityTypes();

        include 'app/Views/create.view.php';
    }




}