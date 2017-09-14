<?php
namespace models;

use components\DatabaseInterface;
use components\DatabaseConnection;
use PDOException;

class MySqlSource implements DatabaseInterface
{

    private $handler;

    public function __construct(DatabaseConnection $connection)
    {
        $this->handler = $connection->getHandler();
    }

    public function select()
    {
        $sql = "SELECT id, name, parent_id FROM category";
        $sth = $this->handler->query($sql);
        $data = $sth->fetchAll();

        if (!$data) {
            throw new PDOException($sth->errorCode());
        }
        return $data;
    }

    public function insert(string $table, array $fieldsTable, array $values)
    {
        $fields = implode(',', $fieldsTable);
        $placeholders = array_map(function($value) {
            return ':' . $value;
        }, $fieldsTable);

        $placeholder = implode(',', $placeholders);
        $combine = array_combine($placeholders, $values);

        $sql = "INSERT INTO $table ($fields) VALUES ($placeholder)";
        $sth = $this->db->prepare($sql);

        foreach ($combine as $key => $value) {
            $sth->bindValue($key, $value);
        }

        if (!$sth->execute()) {
            throw new PDOException($sth->errorCode());
        }
    }

    public function update(string $name, int $id)
    {
        $sql = "UPDATE category SET name = :name WHERE id = :id";
        $sth = $this->db->prepare($sql);
        $sth->bindValue(':name', $name);
        $sth->bindValue(':id', $id);

        if (!$sth->execute()) {
            throw new PDOException($sth->errorCode());
        }
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM category WHERE id = :id";
        $sth = $this->db->prepare($sql);
        $sth->bindValue(':id', $id);

        if (!$sth->execute()) {
            throw new PDOException($sth->errorCode());
        }
    }
}
