<?php
require_once("Models/User.php");
require_once("Views/UserView.php");
class UserController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
        $this->view = new UserView($this->session);
        $this->model = new User();
    }
    function loginView()
    {
        $this->view->loginView();
    }

    function login($data)
    {
        $userName = $data['email'];
        $pass = $data['opass'];
    
        
        
        if($this->model->verifyUser($userName,$pass))
        {
            $user = $this->model->getByUsername($userName);
          
            $this->session->login($user);
            $this->view->goHome();
        }
        else{
            $this->view->errors("Datos incorrectos");
            $this->view->loginView();
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
        if ($data['opass'] != $data['rpass']) {
            $this->view->errors("Las contraseñas no coinciden");
            $this->view->RegisterView();
        } else {
            $userName = $data['email'];
            $pass = $data['opass'];

            $this->model->register($userName, $pass);
            $this->model->login($userName, $pass);
            $this->view->goHome();
        }
    }
}
