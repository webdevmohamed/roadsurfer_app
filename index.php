<?php

require_once 'config/config.php';
require_once 'core/Router.php';

Router::get('/', 'IndexController@index');

Router::handle();