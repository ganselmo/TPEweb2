<?php
require_once '.\Repositories\Session.php';

class Controller 
{
    protected $model;
    protected $view;
    protected $session;
   
    public function __construct(Session $session)
    {
        $this->session = $session;
    }


    public function get(){
        $query = $this->model->get();
        $this->view->display($query);
    }
}