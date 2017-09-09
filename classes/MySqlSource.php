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

    public function select(int $fid)
    {
        $sql = "SELECT name FROM category WHERE parent_id = :parent_id";
        $sth = $this->handler->query($sql);
        $sth->bindValue(':parent_id', $fid);
        $data = $sth->fetchAll();

        if (!$data) {
            throw new PDOException($sth->errorCode());
        }
        return $data;
    }

    public function insert(string $name, int $fid)
    {
        $sql = "INSERT INTO category (name, parent_id) VALUES (name = :name, parent_id = :parent_id)";
        $sth = $this->handler->prepare($sql);
        $sth->bindValue(':name', $name);
        $sth->bindValue(':parent_id', $fid);
        
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
