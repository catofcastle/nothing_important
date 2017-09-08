<?php

define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);

function loadFromClasses($className) {
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $file = ROOT_PATH . $path . '.php';
    if (file_exists($file)) {
        require_once $file;
        return true;
    }
    return false;
}
