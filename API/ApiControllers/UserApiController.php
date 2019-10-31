<?php
require_once("Models/UserModel.php");
require_once("API/ApiViews/UserApiView.php");

class UserApiController extends ApiController 
{
    public function __construct()
    {
        $this->model = new UserModel();
        $this->view = new UserApiView();
    }

    public function login(){
        if(isset($_POST['user']) && isset($_POST['opass'])) {
            if($_POST['user'] != null) {
                $user = $this->model->getUser($_POST['user']);
                if ($user != null && password_verify($_POST['opass'], $user->password)){
                    Session::getInstance();
                    $_SESSION['user'] = $user->user;
                    $_SESSION['userId'] = $user->id;
                    $this->view->goHome();
                }else{
                    $this->view->registerView();
                }
            } else {
                $this->view->loginView();
            }
        } else {
            $this->view->loginView();
        }

    }

    public function logout(){
        Session::getInstance();
        session_destroy();
        $this->view->loginView();
    }
    
    public function registracion() {
        if(isset($_POST['user']) && isset($_POST['opass']) && isset($_POST['rpass'])) {
            if(($_POST['user'])!= null && $_POST['opass'] != "" && ($_POST['opass'] == $_POST['rpass'])) {
                $user = $this->model->getUser($_POST['user']);
                if ($user !=null && !($_POST['user'] == $user->user)) {
                    $pass = password_hash($_POST['opass'], PASSWORD_DEFAULT);
                    $this->model->create(array($_POST['user'], $pass));
                    $this->view->loginView();
                } else {
                    $this->view->loginView();
                }
            } else {
                $this->view->registerView();
            }
        } else {
            $this->view->registerView();
        }
    }

    public function checkLogIn(){
        Session::getInstance();
        
        if(!isset($_SESSION['userId'])){
            $this->view->loginView();
            die();
        }

        if ( isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 20000)) { 
            $this->logout();
            die();
        } 
        
        $_SESSION['LAST_ACTIVITY'] = time();
    }
}