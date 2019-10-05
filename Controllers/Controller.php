<?php

abstract class Controller 
{
    public abstract function add();

    public abstract function delete();

    public abstract function update();

    public function get(){
        $query = $this->model->all();
        $this->view->display($query);
    }
}