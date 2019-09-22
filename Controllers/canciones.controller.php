<?php
require_once '.\Models\canciones.model.php';
require_once '.\Views\canciones.view.php';

class CancionesController extends Controller {
    private $model;
    private $view;

    function __construct() {

    }

    public function get() {
        $juegos = $this->model->getJuegos();
        $this->view->displayJuegos($juegos);
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

    public function delete($id) {
        $this->model->deleteJuego($id);
        header("Location: " . BASE);
    }

    public function update($id, $nombre, $jugadores, $cartas) {
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