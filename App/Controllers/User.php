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
        if (! $this->access()){
            $this->redirect();
        } else {
            $email = $_POST['email'] ?? null ;
            $password = $_POST['password'] ?? null;
            var_dump($email);
            var_dump($password);
            if (null!=$email && null!=$password) {
                try {
                    $user = \App\Models\User::getUser($email, $password);
                    $this->sesson->userId = $user->id;
                    $this->sesson->userRole = $user->role;
                } catch (\Exception $e) {
                    $this->errors[] = $e->getMessage();
                }
            }
            $this->view->errors = $this->errors;
            $this->view->display('signin.php');

        }

    }
    public function actionSignUp()
    {

    }

    protected function access():bool
    {
        if ($this->sesson->userRole === 1 || $this->sesson->userRole === 2){
            return false;
        } else {
            return true;
        }
    }


}