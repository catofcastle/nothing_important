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

    public function selectAllCategory()
    {
       return $this->source->select();
    }

    public function addCategory(string $name, int $fid = null)
    {
        $this->source->insert($name, $fid);
    }

    public function updateCategory(string $name, int $id)
    {
        $this->source->update($name, $id);
    }

    public function deleteCategory(int $fid)
    {
        $this->source->delete($fid);
    }
}
