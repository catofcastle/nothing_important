<?php
namespace controllers;

use components\DatabaseConfiguration;
use components\DatabaseConnection;
use models\MySqlSource;
use models\RepositorySource;

class MainController
{

    public function actionRun()
    {
        $configuration = new DatabaseConfiguration(
            'mysql:dbname=test;host=127.0.0.1', 
            'root', 
            'henrietta'
        );

        $connection = new DatabaseConnection($configuration);
        $source = new MySqlSource($connection);
        $repository = new RepositorySource();
        $repository->setSource($source);
        
        $data = $repository->selectAllCategory();
        var_dump($data);
    }
}
