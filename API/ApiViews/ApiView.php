<?php
require_once('libs/Smarty.class.php');
class ApiView
{
    protected $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->assign('BASE',BASE);
    }

    function goHome()
    {
        $this->smarty->assign('titulo',"Bienvenido");
        $this->smarty->display('templates/home copy.tpl');
    }
}