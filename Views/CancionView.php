<?php

require_once('libs/Smarty.class.php');


class CancionView {

    function __construct(){

    }

    public function display($canciones){
        $smarty = new Smarty();
        $smarty->assign('titulo',"Canciones");
        $smarty->assign('BASE',BASE);
        $smarty->assign('canciones',$canciones);
        $smarty->display('templates/canciones.tpl');
    }
}