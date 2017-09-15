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
    public static function initialize(DatabaseConfiguration $configuration)
    {
        if (null === self::$instance) {
            self::$instance = new PDO(
                $configuration->getDsn(), 
                $configuration->getUsername(), 
                $configuration->getPassword(), 
                $configuration->getOptions()
            );
        }
    }

    public static function getInstance()
    {
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
