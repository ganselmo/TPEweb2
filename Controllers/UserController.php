<?php
require_once("Models/User.php");
require_once("Views/UserView.php");
class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view = new UserView($this->session);

    }
    function loginView()
    {
        $this->view->loginView();
    }

    function logOut()
    {
        $this->session->logOut();
        $this->view->goHome();
    }
    function registerView()
    {
        $this->view->RegisterView();
    }

}
