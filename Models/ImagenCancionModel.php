<?php
require_once("Models/Modelo.php");


class ImagenCancionModel extends Modelo
{
    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
        $this->query = new QuerySQL();
        $this->tabla = "cancionImagenes";
    }

    public function save($data)
    {
        $sentencia = $this->db->prepare($this->query->insert($this->tabla, array('nombre', 'duracion', 'genero', 'album', 'id_artista', 'ranking')));
        $sentencia->execute([$data->nombre, $data->duracion, $data->genero, $data->album, $data->id_artista, $data->ranking]);
    }


    public function getByCancion($id_cancion)
    {
        $query = $this->db->prepare("SELECT * FROM cancionImagenes WHERE id_cancion = ?");
        $query->execute([$id_cancion]);
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
}
