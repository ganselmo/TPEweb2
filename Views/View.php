<?php
require_once('libs/Smarty.class.php');
require_once('.\Repositories\Session.php');
class View
{
    protected $smarty;
    protected $session;
    protected $errors;
    function __construct()
    {
        $this->session = new Session();
        $this->smarty = new Smarty();

        $this->smarty->assign('titulo', "Bienvenidos");
        $this->smarty->assign('session', $this->session);
        $this->smarty->assign('BASE', BASE);
    }

    function goHome()
    {
        $this->smarty->display('templates/home.tpl');
    }
    function errors($errors)
    {

        $this->errors = $errors;
        $this->smarty->assign('errors', $this->errors);
    }
    function set_url($url)
    {
        echo ("<script>history.replaceState({},'','$url');</script>");
    }
}
