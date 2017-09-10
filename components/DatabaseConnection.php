<?php
namespace components;

use components\DatabaseConfiguration;
use PDO;

class DatabaseConnection
{

    private static
        $instance = null;

    public function getHandler(): PDO
    {
        return new PDO(
            $this->configuration->getDsn(), $this->configuration->getUsername(), $this->configuration->getPassword(), $this->configuration->getOptions()
        );
    }

    /**
     * @return Singleton
     */
    public static function getInstance(DatabaseConfiguration $configuration)
    {
        if (null === self::$instance) {
            self::$instance = new PDO(
                $this->configuration->getDsn(), 
                $this->configuration->getUsername(), 
                $this->configuration->getPassword(), 
                $this->configuration->getOptions()
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
