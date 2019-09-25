<?php
require_once 'Controller.php';
require_once '.\Models\Artista.php';

class ArtistaController extends Controller {

    function __construct() {
        $this->model = new Artista();
    }

    public function index()
    {
        
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
