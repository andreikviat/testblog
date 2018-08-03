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

    public static function findByEmail($email)
    {
        $sql = 'SELECT * FROM users WHERE email=:email';
                $db = new Db();
        $data[':email'] = $email;

        return $db->query($sql, $data, static::class);
    }

    public static function getUser ($email,$password)
    {
        $user = self::findByEmail($email)[0];
       if (null!==$user && password_verify($password, $user->passwordHash))
        {
            return $user;
        }
        else {
            throw new \Exception('Check your email and password');
        }
    }

    public function insert()
    {
        $sql = 'INSERT INTO Users (name, email, role, passwordHash) VALUES (:name,:email, :role, :passwordHash)';
        $db = new Db();
        $data[':name'] = $this->name;
        $data[':email'] = $this->email;
        $data[':role'] = $this->role;
        $data[':passwordHash'] = $this->passwordHash;
        $db->execute($sql, $data);
        $this->id = $db->getLastId();
    }
}