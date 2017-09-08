<?php


function loadFromClasses($className)
{
    $classFilePath = $className . '.php';
    if (file_exists($classFilePath)) {
        require_once $classFilePath;
        return true;
    }
    return false;
}
