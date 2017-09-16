<?php
namespace core;

use components\DatabaseConnection;

class Model
{

    protected $handlerDb;

    public function __construct()
    {
        $this->handlerDb = DatabaseConnection::getInstance();
    }
}
