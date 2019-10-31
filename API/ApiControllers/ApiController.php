<?php
require_once '.\Repositories\Session.php';

class ApiController 
{
    protected $model;
    protected $view;
    protected $session;
   
    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    /*public abstract function delete();*/

    /* public abstract function update(); */

    public function get(){
        $query = $this->model->get();
        $this->view->display($query);
    }
}