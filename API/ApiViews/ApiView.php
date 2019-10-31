<?php
require_once('libs/Smarty.class.php');
require_once('.\Repositories\Session.php');
class ApiView
{
    protected $smarty;
    private $session;
    function __construct()
    {
        $this->session = new Session();
        $this->smarty = new Smarty();
        $this->smarty->assign('titulo',"Bienvenidos");
        $this->smarty->assign('session',$this->session);
        $this->smarty->assign('BASE',BASE);
    }

    function goHome()
    {
        $this->smarty->display('templates/home copy.tpl');
    }
}