<?php
require_once("Models/Modelo.php");
require_once("Models/ArtistaModel.php");
require_once("Models/ImagenCancionModel.php");
class CancionModel extends Modelo
{
    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
        $this->query = new QuerySQL();
        $this->tabla = "canciones";
    }

    public function create($data)
    {
        $sentencia = $this->db->prepare($this->query->insert($this->tabla, array('nombre', 'duracion', 'genero', 'album', 'id_artista', 'ranking')));
        $sentencia->execute([$data->nombre, $data->duracion, $data->genero, $data->album, $data->id_artista, $data->ranking]);
    }

    public function update($data)
    {
        $sentencia = $this->db->prepare($this->query->update($this->tabla, array('nombre', 'duracion', 'genero', 'album', 'id_artista', 'ranking')));
        $sentencia->execute([$data->nombre, $data->duracion, $data->genero, $data->album, $data->id_artista, $data->ranking, $data->id]);
    }


    public function getWithArtista($id)
    {

        $cancion = $this->getByID($id);

        $artista = new ArtistaModel();
        $cancion->artista = $artista->getByID($cancion->id_artista);
        unset($cancion->id_artista);
        return $cancion;
    }
    public function getAllWithArtista()
    {
        $query = $this->db->prepare('SELECT * FROM artistas INNER JOIN canciones ON artistas.id = canciones.id_artista');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);

        $canciones = [];
        foreach ($result as $cancion) {
            array_push($canciones, $this->getWithArtista($cancion->id));
        }

        return $canciones;
    }

    public function getImages($id)
    {
        $images = new ImagenCancionModel();
        return $images->getByCancion($id);
    }
}
