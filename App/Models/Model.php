<?php

namespace App\Models;

use  App\Db;
abstract class Model
{
    protected $id;

    abstract public static function findAll();


   abstract public static function findById($id);


    abstract protected function insert();
    abstract protected function update();
    abstract public function delete();
    abstract public function save();
}
