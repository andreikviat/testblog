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

    public function insert()
    {
        $sql= 'INSERT INTO posts (title, short_description, content, image, user_id) VALUES (:title, :short_description, :content, :image, :user_id)';
        $db = new Db();
        $data[':title'] = $this->title;
        $data[':short_description'] = $this->short_description;
        $data[':content'] = $this->content;
        $data[':image'] = $this->image;
        $data[':user_id'] = $this->user_id;
        $db->execute($sql,$data);

    }

    public function update()
    {
        $sql = 'UPDATE posts set title=:title, short_description=:short_description, content=:content, image=:image WHERE id=:id';
        $db = new Db();
        $data[':title'] = $this->title;
        $data[':short_description'] = $this->short_description;
        $data[':content'] = $this->content;
        $data[':image'] = $this->image;
        $data[':id'] = $this->id;
        $db->execute($sql,$data);
    }



}