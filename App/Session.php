<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 03.08.2018
 * Time: 9:52
 */

namespace App;


class Session
{
    private const SESSION_STARTED = TRUE;
    private const SESSION_NOT_STARTED = FALSE;

    private $sessionState = self::SESSION_NOT_STARTED;

    private static $instance;

    private function __construct()
    {

    }

    public static function getInstance()
    {
        if ( !isset(self::$instance))
        {
            self::$instance = new self;
        }

        self::$instance->startSession();

        return self::$instance;
    }

    public function startSession()
    {
        if ( $this->sessionState == self::SESSION_NOT_STARTED )
        {
            $this->sessionState = session_start();
        }

        return $this->sessionState;
    }

    public function __set($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public function __get($name)
    {
        if (isset ($_SESSION[$name])){
            return $_SESSION[$name];
        } else
            return null;
    }

    public function __isset($name)
    {
        return isset($_SESSION[$name]);
    }

    public function __unset($name)
    {
        unset ($_SESSION[$name]);
    }

}