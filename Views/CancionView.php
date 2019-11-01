<?php
require_once("View.php");

class CancionView extends View{
    function __construct(){
        parent::__construct();
    }

    public function showIndex($canciones, $artistas){
        $this->smarty->assign('artistas',$artistas);
        $this->smarty->assign('canciones',$canciones);
        $this->smarty->display('templates/allCanciones.tpl');
    }

    public function showOne($cancion){

        $this->smarty->assign('cancion',$cancion);
        $this->smarty->display('templates/Cancion.tpl');
    }
    public function create($artistas)
    {
        $this->smarty->assign('artistas',$artistas);
        $this->smarty->display('templates/CancionCreate.tpl');
    }
    public function edit($cancion)
    {
        $this->smarty->assign('cancion',$cancion);
        $this->smarty->display('templates/CancionEdit.tpl');
    }
}