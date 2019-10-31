<?php
require_once 'ApiController.php';
require_once '.\Models\ArtistaModel.php';
require_once '.\API\ApiViews\ArtistaApiView.php';

class ArtistaApiController extends ApiController {

    function __construct() {
        $this->model = new ArtistaModel();
        $this->view= new ArtistaApiView();
    }

    public function index()
    {
        $artistas = $this->model->get();

        $this->view->showIndex($artistas);
    }

    public function show($id)
    {
        $artista = $this->model->findById($id);

        $this->view->showOne($artista);
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
            header("Location: " . BASE_ARTISTA);
        }
    }

    public function delete() {
        $this->model->delete($id);
        header("Location: " . BASE_ARTISTA);
    }

    public function update() {
        if(isset($_POST) && isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['fechanac']) && isset($_POST['ranking'])) {
            $this->model->update(array($_POST['nombre'], $_POST['apellido'], $_POST['fechanac'], $_POST['ranking'], $_POST['id']));
            header("Location: " . BASE_ARTISTA);
        } elseif (isset($_POST) && isset($_POST['id'])) {
            $artista = $this->findById($_POST['id']);
            $this->view->displayUpdate($artista);
        }
    }

    private function findById($id) {
        return $this->model->getByID($id);
    }
}

