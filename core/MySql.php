<?php
namespace core;

use PDO;
use core\Model;

class MySql extends Model
{

    private $sql = [];

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

    public function add(string $sqlPart)
    {
        $this->sql[] = $sqlPart;

        return $this;
    }

    public function select(array $fields): MySql
    {
        $this->fields = 'SELECT ' . implode(',', $fields);

        return $this->add($this->fields);
    }

    public function insert(array $fields): MySql
    {


        return $this;
    }

    public function from(string $table, string $alias): MySql
    {
        $this->from = ' FROM ' . $table . ' AS ' . $alias;

        return $this->add($this->from);
    }

    public function where(string $condition): MySql
    {
        $this->where = ' WHERE ' . $condition;

        return $this->add($this->where);
    }

    public function execute()
    {
        foreach ($this->sql as $sqlPart) {
            $sql .= $sqlPart;
        }
        
        $sth = $this->handlerDb->query($sql);
        
        return $sth->fetch(PDO::FETCH_ASSOC);
    }
}
