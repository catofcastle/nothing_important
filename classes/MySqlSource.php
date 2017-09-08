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

    public function select(string $tableName = null, array $fieldsTable = null)
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

    public function insert(string $tableName = null, array $fieldsTable = null, array $values = null)
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
        $sql = "UPDATE $table1, $table2 SET $table1.plus = false WHERE $table1.fid_news = $table2.id_news AND $table1.user = :user;";
        $sth = $this->db->prepare($sql);
        $sth->bindValue(':user', $username);

        if (!$sth->execute()) {
            throw new PDOException($sth->errorCode());
        }
    }

    public function delete(string $tableName = null, array $bind = null)
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
