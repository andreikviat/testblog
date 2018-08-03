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
        $user = User::findById($this->session->userId)[0];
        $this->view->user = $user;
        $this->view->posts = $post;
        $this->view->display('post.php');
    }

    public function actionCreate()
    {

    }

    public function actionEdit($id)
    {

    }

    public function actionDelete($id)
    {
       $post = \App\Models\Post::findById($id)[0];
       $post->delete();
       $this->redirect();

    }

    public  function access(): bool
    {
        if (($this->session->userRole == '2')){
            return true;
        } else {
            return false;
        }

    }

}