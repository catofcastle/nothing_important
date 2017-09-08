<?php

use classes\DatabaseConfiguration;
use classes\DatabaseConnection;
use classes\MySqlSource;
use classes\RepositorySource;


require_once 'autoload.php';

spl_autoload_register('loadFromClasses');

$configuration = new DatabaseConfiguration(
    'mysql:dbname=test;host=127.0.0.1', 
    '', 
    ''
    );

$connection = new DatabaseConnection($configuration);
$source = new MySqlSource($connection);
$repository = new RepositorySource();

$repository->setSource($source);
