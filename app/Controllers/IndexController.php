<?php

require 'app/Models/FitnessActivityModel.php';

class IndexController
{

    public function index()
    {
        echo "entraaaa";
        $fitnessActivityModel = new FitnessActivityModel();
        $fitnesActivities = $fitnessActivityModel->getAll();
        require 'app/Views/index.view.php';
    }

}