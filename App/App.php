<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 03.08.2018
 * Time: 9:26
 */
namespace App;


class App
{
    public const USER_ROLE = [
        'Guest' => '0',
        'User' => '1',
        'Writer' => '2',
        ];

    protected static $session;

    public static function run()
    {
        self::route();
    }

    public static function init()
    {
        self::$session = Session::getInstance();
        if (!isset(self::$session->userId) && !isset(self::$session->userRole)){
            self::$session->userId = 0;
            self::$session->userRole = self::USER_ROLE['Guest'];
        }

    }

    private static function route()
    {
        $string = $_SERVER['REQUEST_URI'];
        list (,$controllerName, $actionName, $params) = explode('/',$string);
        $controllerName = '\App\Controllers\\'.ucfirst($controllerName);
        $actionName = 'action'.ucfirst($actionName);
        if ($controllerName != null && $actionName !='action') {
            if (class_exists($controllerName) && in_array($actionName, get_class_methods($controllerName))) {
                $ctrl = new $controllerName(self::$session);
                $ctrl->$actionName($params);
            }
        } else {
            $ctrl = new \App\Controllers\Post(self::$session);
            $ctrl->actionIndex();
        }
    }

    public static function validateUserName($username):bool
    {
        if (1===preg_match('/^[a-zA-Z][a-zA-Z0-9]{0,15}/',$username)) {
            return true;
        } else {
            return false;
        }

    }

    public static function validateEmail($email):bool
    {
        if ($email===filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else return false;

    }

    public static function validatePassword($password):bool
    {
        if (1 === preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/',$password)) {
            return true;
    } else {
            return false;
        }

    }

    public static function validateConfirmPassword($password1, $password2):bool
    {
        return ($password1===$password2 )? true : false;
    }

}