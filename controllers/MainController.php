<?php
namespace controllers;

use core\Controller;
use core\MySql;

class MainController extends Controller
{

    public function actionRun()
    {
        $query = (new MySql())
            ->select(['id', 'name'])
            ->from('category', 'CTG')
            ->where("CTG.name = 'Rose'")
            ->execute();
        
        echo '<pre>';
        var_dump($query);
        echo '<\pre>';
    }

    public function actionTest()
    {
        echo 'Hello!';
    }
}
