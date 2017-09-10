<?php
namespace components;

interface DatabaseInterface
{

    public function select();

    public function insert(string $name, int $fid);

    public function update(string $name, int $id);

    public function delete(int $id);
}
