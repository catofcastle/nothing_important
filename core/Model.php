<?php
namespace core;

use components\DatabaseConnection;

class Model
{

    protected $handlerDb;

    public function __construct(DatabaseConnection $connection)
    {
        $this->handlerDb = $connection::getInstance();
    }
}
