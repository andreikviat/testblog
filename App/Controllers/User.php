<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 03.08.2018
 * Time: 10:56
 */

namespace App\Controllers;


class User extends Controller
{
    public function actionSignIn()
    {


        if (!$this->access()){
               $this->redirect();
        }
        if (isset($_POST['email'])&& isset($_POST['password'])) {
            $this->authorisateUser($_POST['email'], $_POST['password']);
            $this->view->display('signin.php');
        }else {
            $this->view->display('signin.php');
        }

    }
    public function actionSignUp()
    {
        if (! $this->access()) {
            $this->redirect();
        }
        $user = new \App\Models\User();
        $user->email = $_POST['email'];
        $user->role = 1;
        $user->name = $_POST['name'] ?? null;
        $user->passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user->insert();
        $this->view->errors = $this->errors;
        $this->view->display('signup.php');

    }

    protected function access():bool
    {
        if (($this->session->userRole == '0')){
            return true;
        } else {
            return false;
        }
    }

    protected function authorisateUser($email, $password)
    {

        try{
            $user = \App\Models\User::getUser($email, $password);

            $this->session->userId = $user->id;
            $this->session->userRole = $user->role;

            $this->redirect();
        } catch (\Exception $e) {
            $this->errors[] = $e->getMessage();
        }
        $this->view->errors = $this->errors;


    }


}