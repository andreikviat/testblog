<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 02.08.2018
 * Time: 14:46
 */

namespace App\Models;


use App\Db;

class Post extends Model
{
    protected const TABLE = 'posts';

    public $id;
    public $title;
    public $content;
    public $image;
    public $date;
    public $user_id;
    public $short_description;
    public $user;

    public function delete()
    {
       $sql = 'DELETE FROM posts WHERE id = :id';
       $data[':id'] = $this->id;
       $db = new Db();
       $db->execute($sql,$data);
    }

    public static function findAll()
    {
        $sql = 'SELECT posts.*, users.name as user FROM posts left JOIN users ON ( posts.user_id = users.id ) ORDER BY posts.date DESC';
        $db = new Db();
        return $db->query($sql, [], static::class);

    }

    public static function findById($id)
    {
        $sql = 'SELECT posts.*, users.name as user FROM posts left JOIN users ON ( posts.user_id = users.id ) WHERE posts.id =:id';
        $db = new Db();
        $data[':id'] = $id;
        return $db->query($sql, $data, static::class);
    }

    protected function insert()
    {
        // TODO: Implement insert() method.
    }

    protected function update()
    {

    }

    public function save()
    {

    }


}