<?php
require_once 'Controller.php';
require_once '.\Models\Artista.php';
require_once '.\Views\ArtistaView.php';

class ArtistaController extends Controller {

    function __construct() {
        $this->model = new Artista();
        $this->view= new ArtistaView();
    }

    public function index()
    {
        $artistas = $this->model->all();

        $this->view->showIndex($artistas);
    }

    public function show($id)
    {
        $artista = $this->model->findById($id);

        $this->view->showOne($artista);
    }
    public function edit($id)
    {
        $artista = $this->model->findById($id);

        $this->view->edit($artista);
    }

    

    public function add() {
        if(isset($_GET) && isset($_GET['name']) && isset($_GET['players'])) {
            if(isset($_GET['cards']) == "on") {
                $cartas = 1;
            } else {
                $cartas = 0;
            }
            $juego = array($_GET['name'], $_GET['players'], $cartas);
            $this->model->addJuego($juego);
            header("Location: " . BASE);
        }
    }

    public function delete() {
        $this->model->delete($id);
        header("Location: " . BASE);
    }

    public function update() {
        if(isset($_GET) && isset($_GET['id']) && isset($_GET['name']) && isset($_GET['players'])) {
            if(isset($_GET['cards']) == "on") {
                $cartas = 1;
            } else {
                $cartas = 0;
            }
            $this->model->updateJuego($_GET['id'], $_GET['name'], $_GET['players'], $cartas);
            header("Location: " . BASE);
        } else {
            if($cartas == "checked") {
                $cartas = 1;
            } else {
                $cartas = 0;
            }
            $juego = array($id, $nombre, $jugadores, $cartas);
            $this->view->displayUpdateJuego($juego);
        }
    }
}

