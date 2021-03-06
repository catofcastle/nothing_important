<?php
namespace core;

class Route
{

    public static function run()
    {
        $controllerName = 'Main';
        $actionName = 'Run';

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        if (!empty($routes[1])) {
            $controllerName = ucfirst($routes[1]);
        }

        if (!empty($routes[2])) {
            $actionName = ucfirst($routes[2]);
        }
        
        $controllerName = $controllerName . 'Controller';
        $actionName = 'action' . $actionName;

        $controllerFile = $controllerName . '.php';
        $controllerPath = 'controllers/' . $controllerFile;
        
        if (!file_exists($controllerPath)) {
            Route::ErrorPage404();
        }
        
        $controller = "\\controllers\\$controllerName";
        $controller = new $controller();
        $action = $actionName;

        if (method_exists($controller, $action)) {
            $controller->$action();
        } else {
            Route::ErrorPage404();
        }
    }

    private static function ErrorPage404()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404');
    }
}
