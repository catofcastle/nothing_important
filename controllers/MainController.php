<?php
namespace controllers;

use models\MySqlSource;
use models\RepositorySource;

class MainController
{

    public function actionRun()
    {

        $source = new MySqlSource($connection);
        $repository = new RepositorySource();
        $repository->setSource($source);

        $data = $repository->selectAllCategory();
        var_dump($data);
    }

    public function actionTest()
    {
        echo 'Hello!';
    }
}
