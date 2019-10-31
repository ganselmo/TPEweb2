<?php
require_once('libs/Smarty.class.php');

class CancionApiView {
    function __construct(){
    }

    public function display($canciones){
        $smarty = new Smarty();
        $smarty->assign('titulo',"Canciones");
        $smarty->assign('BASE',BASE);
        $smarty->assign('canciones',$canciones);
        $smarty->display('templates/cancionesAdm.tpl');
    }

    public function displayUpdate($cancion){
        $smarty = new Smarty();
        $smarty->assign('titulo',"Canción a modificar");
        $smarty->assign('cancion',$cancion);
        $smarty->assign('BASE',BASE);
        $smarty->display('templates/cancionAdmUpdate.tpl');
    }
}