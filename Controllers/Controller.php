<?php

class Controller 
{
    protected $model;
    protected $view;
    
    public abstract function add();

    public abstract function delete();

    public abstract function update();

    public function get() {
        $this->model->all();
        var_dump($this->model->all());die;
    }
}