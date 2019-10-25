<?php 
require_once("Models/Modelo.php");

class CancionModel extends Modelo 
{
    public function __construct () {
        try {
            $this->db = Database::getInstance()->getConnection();
            $this->query = new QuerySQL();
            $this->tabla = "canciones";
        } catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }
    }

    public function create($values) {
        $sentencia = $this->db->prepare($this->query->insert($this->tabla, array('nombre','duracion','genero','album','id_artista','ranking')));
        $sentencia->execute($values);
    }
}