<?php
namespace classes;


interface DatabaseInterface
{

    public function select();

    public function insert();

    public function update();

    public function delete();
}
