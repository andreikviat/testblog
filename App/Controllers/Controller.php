<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 02.08.2018
 * Time: 19:28
 */

namespace App\Controllers;


use App\Session;
use App\View;

abstract class Controller
{
    protected $view;

    protected $session;

    protected $errors =[];

    public function __construct(Session $session)
    {
        $this->session = $session;
        $this->view = new View();
    }

    protected function access():bool
    {
        return true;
    }

    protected function redirect()
    {
        header('location: http://' . $_SERVER['SERVER_NAME'].'/index.php');
    }


}