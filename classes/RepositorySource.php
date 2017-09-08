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

    public function addCategory(string $category, string $fid = null)
    {
        $this->source->insert('category', ['category', 'fid_category'], [$category, $fid]);
    }

    public function deleteCategory(string $value)
    {
        $bind = ['field' => 'id_category', 'value' => $value];
        $this->source->delete('category', $bind);
    }
}
