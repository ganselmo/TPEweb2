<?php
require_once '.\Repositories\Session.php';

class Controller 
{

    protected $view;
    protected $session;
   
    public function __construct()
    {
        $this->session = new Session();
    }


}