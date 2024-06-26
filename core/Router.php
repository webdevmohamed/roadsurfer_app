<?php

/**
 * Manages all the app routes and REST API
 */
class Router
{
    private static $routes = [
        'GET' => [],
        'POST' => [],
    ];

    public static function get($path, $controllerAction)
    {
        self::$routes['GET'][$path] = $controllerAction;
    }

    public static function post($path, $controllerAction)
    {
        self::$routes['POST'][$path] = $controllerAction;
    }

    public static function handle()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $path = str_replace($_ENV['URL_PREFIX'], "", $path);

        if (isset(self::$routes[$method][$path])) {
            $controllerAction = self::$routes[$method][$path];
            list($controllerName, $methodName) = explode('@', $controllerAction);
            $controllerFile = 'app/Controllers/' . $controllerName . '.php';

            if (file_exists($controllerFile)) {
                require_once $controllerFile;
                $controller = new $controllerName();
                $controller->$methodName();
                exit();
            }
        }
        http_response_code(404);
        include 'app/Views/Errors/404.view.php';
        exit();
    }
}
