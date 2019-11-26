<?php
require_once("Models/User.php");

class UserController extends ApiController
{
    public function __construct()
    {
        parent::__construct();

        $this->model = new User();
    }

    function all()
    {
        return $this->model->all();
    }
    function loginView()
    {
        $this->view->loginView();
    }

    function login($data)
    {
        $userName = $data->email;
        $pass = $data->opass;
        
        if($this->model->verifyUser($userName,$pass))
        {
            $user = $this->model->getByUsername($userName);
            $this->session->login($user);

        }
        else{
          
        }
        
    }
    function logOut()
    {
        $this->model->logOut();
        $this->view->goHome();
    }
    function registerView()
    {
        $this->view->RegisterView();
    }
    function register($data)
    {

       
        if ($data->opass != $data->rpass) {
            $this->view->errors("Las contraseñas no coinciden");


        } else {
            $userName = $data->email;
            $pass = $data->opass;
            
            $this->model->register($userName, $pass);
            $this->login($data);
           
        }
    }
}
