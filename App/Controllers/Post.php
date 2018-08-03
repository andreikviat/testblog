<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 02.08.2018
 * Time: 19:30
 */

namespace App\Controllers;


use App\Models\User;

class Post extends Controller
{

    public function actionIndex()
    {
        $posts = \App\Models\Post::findAll();
        $user = User::findById($this->session->userId)[0];
        $this->view->user = $user;
        $this->view->posts = $posts;
        $this ->view->display('index.php');
    }

    public function actionView($id)
    {
        $post = \App\Models\Post::findById($id);
        $this->view->posts = $post;
        $this->view->display('post.php');
    }

}