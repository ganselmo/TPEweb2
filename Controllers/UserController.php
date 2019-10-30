<?php
require_once("Models/User.php");
require_once("Views/UserView.php");
class UserController extends Controller 
{

   

    public function __construct()
    {
        $this->view= new UserView();

    }
    function loginView()
    {
        $this->view->loginView();
    }

    function login($data)
    {
        $this->model->login($data);
        $this->view->goHome();
    }

    function registerView()
    {
        $this->view->RegisterView();
    }

    function register($data)
    {
        $this->model->new($data);
        $this->view->goHome();
    }


    
}