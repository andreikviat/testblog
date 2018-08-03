<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 03.08.2018
 * Time: 10:56
 */

namespace App\Controllers;


use App\App;

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
        if (!empty($_POST)) {
            $user = new \App\Models\User();
            if (App::validateUserName($_POST['name']))
            {
                $user->name = $_POST['name'];
            } else {
                $this->errors['1'] = 'Username Must start with a letter. Can contain only Latin letters and numbers. Maximum length 16 characters.';
            }
            if (App::validateEmail($_POST['email']))
            {
                if (!empty(\App\Models\User::findByEmail($_POST['email']))) {
                    $this->errors['2'] = 'User with this email already exists';
                } else {
                    $user->email = $_POST['email'];
                }
            } else {
                $this->errors['2'] = 'It is not email address. Please enter real email';
            }
            if (App::validatePassword($_POST['password']))
            {
                $user->passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
            } else {
                $this->errors['3'] = 'Password must conatin lowercase and uppercase letters, at least 1 digit. Minimum length 8 characters';
            }
            if (!App::validateConfirmPassword($_POST['password'], $_POST['confirmpassword']))
            {
                $this->errors['4'] = 'Your password and confirmation password do not match';
            }
            $user->role = 1;

            if (!empty($this->errors)){
                $this->view->errors = $this->errors;
                $this->view->display('signup.php');
            }else {
                $user->insert();
                $this->session->userId = $user->id;
                $this->session->userRole = $user->role;
                $this->redirect();
            }
        } else {
            $this->view->display('signup.php');
        }


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