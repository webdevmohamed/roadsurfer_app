<?php

require_once 'config/config.php';
require_once 'core/Router.php';

Router::get('/', 'FitnessActivityController@index');

Router::post('/filterByActivityType', 'FitnessActivityController@filterActivities');

Router::handle();