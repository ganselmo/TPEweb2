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
            $this->json->response("Usuario Loggeado correctamente",200);
        }
        else{
            $this->json->response("Usuario o Contraseña erroneos",404);
        }
        
    }
    function logOut()
    {
        $this->session->logOut();
        $this->json->response("Usuario Deslogueado",200 );
    }
    function registerView()
    {
        $this->view->RegisterView();
    }
    function register($data)
    {

       
        if ($data->opass != $data->rpass) {
            $this->json->response("Las contraseñas no coinciden",404);


        } else {
            $userName = $data->email;
            $pass = $data->opass;
            $this->model->register($userName, $pass);
            $this->login($data);
           
        }
    }
    function userSession()
    {
        $this->json->response($this->session->getLoggedUserName(),200 );
    }
}
