<?php
namespace classes;

use classes\DatabaseInterface;
use classes\DatabaseConnection;
use PDOException;

class MySqlSource implements DatabaseInterface
{

    private $handler;

    public function __construct(DatabaseConnection $connection)
    {
        $this->handler = $connection->getHandler();
    }

    public function select(string $tableName, array $fieldsTable)
    {
        $fields = implode(',', $fieldsTable);

        $sql = "SELECT $fields FROM $tableName";
        $sth = $this->handler->query($sql);
        $data = $sth->fetchAll();

        if (!$data) {
            throw new PDOException($sth->errorCode());
        }
        return $data;
    }

    public function insert(string $tableName, array $fieldsTable, array $values)
    {
        $fields = implode(',', $fieldsTable);
        $placeholders = array_map(function($value) {
            return ':' . $value;
        }, $fieldsTable);

        $placeholder = implode(',', $placeholders);
        $combine = array_combine($placeholders, $values);

        $sql = "INSERT INTO $tableName ($fields) VALUES ($placeholder)";
        $sth = $this->handler->prepare($sql);

        foreach ($combine as $key => $value) {
            $sth->bindValue($key, $value);
        }

        if (!$sth->execute()) {
            throw new PDOException($sth->errorCode());
        }
    }

    public function update()
    {
        
        
    }

    public function delete(string $tableName, array $bind)
    {
        $field = $bind['field'];
        $value = $bind['value'];
        
        $sql = "DELETE FROM $tableName WHERE $field = :$field";
        $sth = $this->db->prepare($sql);
        $sth->bindValue(":$field", $value);

        if (!$sth->execute()) {
            throw new PDOException($sth->errorCode());
        }
    }
}
