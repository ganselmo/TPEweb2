<?php
require_once("ApiView.php");

class CancionApiView extends ApiView {
    function __construct(){
        parent::__construct();
    }

    public function display($canciones){
        $this->smarty->assign('titulo',"Canciones");
        $this->smarty->assign('canciones',$canciones);
        $this->smarty->display('templates/cancionesAdm.tpl');
    }

    public function displayUpdate($cancion){
        $this->smarty->assign('titulo',"Canción a modificar");
        $this->smarty->assign('cancion',$cancion);
        $this->smarty->assign('BASE',BASE);
        $this->smarty->display('templates/cancionAdmUpdate.tpl');
    }

    public function displayVisitante($canciones){
        $this->smarty->assign('titulo',"Canciones");
        $this->smarty->assign('canciones',$canciones);
        $this->smarty->display('templates/canciones.tpl');
    }
}