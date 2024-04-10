<?php

class Router
{

    private static $routes = [
        '/hola' => 'IndexController',
    ];

    public static function handle($method = 'GET', $path = '/')
    {
        $currentMethod = $_SERVER['REQUEST_METHOD'];
        $currentUri = $_SERVER['REQUEST_URI'];
        if ($currentMethod !== $method) {
            return false;
        }
        $root = '';
        $pattern = '#^'.$root.$path.'$#siD';
        if (preg_match($pattern, $currentUri)) {
            $controllerName = self::$routes[$path];
            $filename = $controllerName . '.php';
            echo 'app' . DIRECTORY_SEPARATOR .
                'Controllers' . DIRECTORY_SEPARATOR .
                $filename;
            require_once
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