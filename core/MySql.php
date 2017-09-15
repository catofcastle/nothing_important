<?php
namespace core;

class MySql
{

    /**
     * @var array
     */
    private $fields;

    /**
     * @var array
     */
    private $from;

    /**
     * @var array
     */
    private $where;

    public function select(array $fields): MySql
    {
        $this->fields = 'SELECT ' . implode(',', $fields);

        return $this;
    }

    public function insert(array $fields): MySql
    {


        return $this;
    }

    public function from(string $table, string $alias): MySql
    {
        $this->from = ' FROM ' . $table . ' AS ' . $alias;

        return $this;
    }

    public function where(string $condition): MySql
    {
        $this->where = ' WHERE ' . $condition;

        return $this;
    }

    public function __toString()
    {
        
    }
}
