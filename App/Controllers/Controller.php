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

    protected $sesson;

    public function __construct(Session $session)
    {
        $this->sesson = $session;
        $this->view = new View();
    }

    public function access():bool
    {
        return true;
    }


}