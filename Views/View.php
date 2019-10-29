<?php
require_once('libs/Smarty.class.php');

class View
{
    protected $smarty;
    function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->assign('titulo',"Bienvenidos");
        $this->smarty->assign('BASE',BASE);
    }
}