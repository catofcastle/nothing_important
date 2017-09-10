<?php

use components\DatabaseConfiguration;
use components\DatabaseConnection;

$configuration = new DatabaseConfiguration(
    'mysql:dbname=test;host=127.0.0.1', 
    'root', 
    'henrietta'
);

$connection = new DatabaseConnection($configuration);
