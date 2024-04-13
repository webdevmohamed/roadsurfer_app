<?php

require_once 'config/config.php';
require_once 'core/Router.php';

Router::get('/', 'FitnessActivityController@index');

Router::post('/getFilteredActivities', 'FitnessActivityController@getFilteredActivities');
Router::post('/getDistanceAccumulated', 'FitnessActivityController@getDistanceAccumulated');
Router::post('/getTotalElapsedTime', 'FitnessActivityController@getTotalElapsedTime');

Router::handle();