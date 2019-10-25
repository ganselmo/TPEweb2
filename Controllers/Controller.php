<?php

abstract class Controller 
{
    protected $model;
    protected $view;
    
    /* public abstract function create(); */

    public abstract function delete();

    /* public abstract function update(); */

    public function get(){
        $query = $this->model->get();
        $this->view->display($query);
    }
}