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

    public function create($id_cancion, $filePath)
    {
        $query = $this->db->prepare($this->query->insert($this->tabla, array('id_cancion','path')));
        $query->execute([$id_cancion,$filePath]);
    }


    public function getByCancion($id_cancion)
    {
        $query = $this->db->prepare("SELECT * FROM cancionImagenes WHERE id_cancion = ?");
        $query->execute([$id_cancion]);
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
}
