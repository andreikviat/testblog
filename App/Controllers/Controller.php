<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 02.08.2018
 * Time: 19:28
 */

namespace App\Controllers;


use App\View;

abstract class Controller
{
    protected $view;
    public function __construct()
    {
        $this->view = new View();
    }

    public function access():bool
    {
        return true;
    }


}