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
        $user = User::findById($this->session->userId)[0];
        $this->view->user = $user;
        if ($this->access()){
            if (empty($_POST)){
                $this->view->display('newpost.php');
            }else {
                $post = new \App\Models\Post();
                $post->title = $_POST['title'];
                $post->short_description = $_POST['short_description'];
                $post->content = $_POST['content'];
                if (isset($_FILES['image'])) {
                    if (0 == $_FILES['image']['error'] && ('image/jpeg' == mime_content_type($_FILES['image']['tmp_name']))) {
                        move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . '/../../images/' . $_FILES['image']['name']);
                        $post->image = $_FILES['image']['name'];
                    } else {
                        $post->image = 'image1.jpg';
                    }
                } else {
                    $post->image = 'image1.jpg';
                }
                $post->user_id = $this->session->userId;
                $post->insert();
                $this->redirect();
            }
        } else {
            $this->redirect();
        }


    }

    public function actionEdit($id)
    {
        $user = User::findById($this->session->userId)[0];
        $this->view->user = $user;
        $post = \App\Models\Post::findById($id)[0];
        if ($this->access()){
            if (empty($_POST)){
                $this->view->post=$post;
                $this->view->display('edit.php');
            }else {
                $post->title = $_POST['title'];
                $post->short_description = $_POST['short_description'];
                $post->content = $_POST['content'];
                $post->id = $_POST['id'];
                if (isset($_FILES['image'])) {
                    if (0 == $_FILES['image']['error'] && ('image/jpeg' == mime_content_type($_FILES['image']['tmp_name']))) {
                        move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . '/../../images/' . $_FILES['image']['name']);
                        $post->image = $_FILES['image']['name'];
                    }
                }
                $post->update();
                $this->redirect();
            }
        } else {
            $this->redirect();
        }
    }

    public function actionDelete($id)
    {
        if ($this->access()){
            $post = \App\Models\Post::findById($id)[0];
            $post->delete();
            $this->redirect();
        } else {
            $this->redirect();
        }


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