<?php

class Controller 
{
    protected $model;
    protected $view;
    
    public function __construct()
    {
        /* TODO : Checkear Sesion*/
    }

    /*public abstract function delete();*/

    /* public abstract function update(); */

    public function get(){
        $query = $this->model->get();
        $this->view->display($query);
    }
}