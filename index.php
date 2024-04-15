<?php
// Redirects every route to a controller (404 page if the route doesnt exist)
require_once 'config/config.php';
require_once 'core/Router.php';

session_start();

Router::get('/', 'IndexController@index');
Router::get('/create', 'IndexController@create');

Router::post('/getFilteredActivities', 'FitnessActivityController@getFilteredActivities');
Router::post('/getDistanceAccumulated', 'FitnessActivityController@getDistanceAccumulated');
Router::post('/getTotalElapsedTime', 'FitnessActivityController@getTotalElapsedTime');

Router::post('/addActivityType', 'ActivityTypeController@addActivityType');
Router::post('/addFitnessActivity', 'FitnessActivityController@addFitnessActivity');

Router::handle();