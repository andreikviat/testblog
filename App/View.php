<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 02.08.2018
 * Time: 10:41
 */

namespace App;


class View
{
    protected $template;
    protected $data=[];

    public function render($template)
    {

    }

    public function display($template)
    {
        include __DIR__.'/Templates/'.$template;
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        return $this->data[$name] ?? null;
    }

    public function __isset($name)
    {
       return isset($this->data[$name]);
    }

}