<?php
namespace classes;

use classes\DatabaseConfiguration;
use PDO;

class DatabaseConnection
{

    /**
     * @var DatabaseConfiguration
     */
    private $configuration;

    /**
     * @param DatabaseConfiguration $config
     */
    public function __construct(DatabaseConfiguration $config)
    {
        $this->configuration = $config;
    }
    
    
    /**
     * @return PDO
     */
    public function getHandler(): PDO
    {
        return new PDO(
            $this->configuration->getDsn(), 
            $this->configuration->getPassword(),
            $this->configuration->getUsername(),
            $this->configuration->getOptions()
            );
    }
}
