<?php

class Router
{

    private static $routes = [
        '/' => 'IndexController',
    ];

    public static function handle($method = 'GET', $path = '/')
    {
        $currentMethod = $_SERVER['REQUEST_METHOD'];
        $currentUri = $_SERVER['REQUEST_URI'];

        if ($currentMethod !== $method) {
            return false;
        }
        $root = '/roadsurfer_app';
        $pattern = '#^'.$root.$path.'$#siD';

        if (preg_match($pattern, $currentUri)) {
            $controllerName = self::$routes[$path];
            $filename = $controllerName . '.php';
            require_once __DIR__ . DIRECTORY_SEPARATOR .
                'app' . DIRECTORY_SEPARATOR .
                'Controllers' . DIRECTORY_SEPARATOR .
                $filename;

            $controller = new $controllerName();
            $controller->index();
            exit();
        }

        return false;
    }

}