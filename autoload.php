<?php
define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);

function loadFromClasses($className)
{
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $file = ROOT_PATH . $path . '.php';
    if (file_exists($file)) {
        require_once $file;
        return true;
    }
    return false;
}

function loadFromControllers($controllerName)
{
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $controllerName);
    $file = ROOT_PATH . $path . '.php';
    if (file_exists($file)) {
        require_once $file;
        return true;
    }
    return false;
}

function loadFromCore($coreName)
{
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $coreName);
    $file = ROOT_PATH . $path . '.php';
    if (file_exists($file)) {
        require_once $file;
        return true;
    }
    return false;
}

function loadFromModels($modelName)
{
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $modelName);
    $file = ROOT_PATH . $path . '.php';
    if (file_exists($file)) {
        require_once $file;
        return true;
    }
    return false;
}