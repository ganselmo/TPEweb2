<?php
require_once("View.php");

class CancionView extends View{
    function __construct(){
        parent::__construct();
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

    public function showIndex($canciones){

        $this->smarty->assign('canciones',$canciones);
        $this->smarty->display('templates/allCanciones.tpl');
    }

    public function showOne($cancion){

        $this->smarty->assign('cancion',$cancion);
        $this->smarty->display('templates/Cancion.tpl');
    }
    public function create()
    {
        $this->smarty->display('templates/ArtistaCreate.tpl');
    }
    public function edit($cancion)
    {
        $this->smarty->assign('cancion',$cancion);
        $this->smarty->display('templates/CancionEdit.tpl');
    }
}