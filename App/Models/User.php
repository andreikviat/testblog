<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 02.08.2018
 * Time: 19:55
 */

namespace App\Models;


use App\Db;

class User extends Model
{
    public $id;
    public $name;
    public $email;
    public $role;
    public $passwordHash;

    public static function findAll()
    {
        $sql = 'SELECT * FROM users';
        $db = new Db();
        return $db->query($sql,[], static::class);

    }

    public static function findById($id)
    {
        $sql = 'SELECT * FROM users WHERE id =:id';
        $db = new Db();
        $data[':id'] = $id;
        return $db->query($sql, $data, static::class);
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

    public function save()
    {
        // TODO: Implement save() method.
    }

    public function insert()
    {
        // TODO: Implement insert() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }


}