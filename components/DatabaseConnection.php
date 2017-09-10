<?php
namespace components;

use components\DatabaseConfiguration;
use PDO;

class DatabaseConnection
{

    private static
        $instance = null;

    /**
     * @return Singleton
     */
    public static function getInstance(DatabaseConfiguration $configuration) : PDO
    {
        if (null === self::$instance) {
            self::$instance = new PDO(
                $configuration->getDsn(), 
                $configuration->getUsername(), 
                $configuration->getPassword(), 
                $configuration->getOptions()
            );
        }
        return self::$instance;
    }

    private function __clone()
    {
        
    }

    private function __construct()
    {
        
    }

    private function __wakeup()
    {
        
    }
}
