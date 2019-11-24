<?php
require_once '.\Repositories\Session.php';

class ApiController 
{
    protected $model;
    protected $view;
    protected $session;
   
    public function __construct()
    {
        $this->session = new Session();
    }


    public function get(){
        $query = $this->model->get();
        $this->view->display($query);
    }
}