<?php
namespace classes;

use classes\DatabaseInterface;

class RepositorySource
{

    private $source;

    public function setSource(DatabaseInterface $source)
    {
        $this->source = $source;
    }

    public function selectCategory()
    {
        
    }

    public function addCategory(string $name, int $fid = null)
    {
        $this->source->insert($name);
    }

    public function deleteCategory(string $value)
    {
        $bind = ['field' => 'id_category', 'value' => $value];
        $this->source->delete('category', $bind);
    }
}
