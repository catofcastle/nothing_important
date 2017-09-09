<?php
namespace classes;

interface DatabaseInterface
{

    public function select(int $fid);

    public function insert(string $name, int $fid);

    public function update(string $name, int $id);

    public function delete(int $id);
}
