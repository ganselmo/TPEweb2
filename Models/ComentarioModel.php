<?php 
require_once("Models/Modelo.php");

class ComentarioModel extends Modelo
{
    public function __construct () {
        $this->db = Database::getInstance()->getConnection();
        $this->query = new QuerySQL();
        $this->tabla = "comentarios";
    }

    public function create($data) {
        $sentencia = $this->db->prepare($this->query->insert($this->tabla, array('id_user','timestamp','comentario','valoracion','id_cancion')));
        $sentencia->execute([$data->id_user,$data->timestamp,$data->comentario,$data->valoracion,$data->id_cancion]);
    }

    public function update($data) {
        $sentencia = $this->db->prepare($this->query->update($this->tabla, array('id_user','timestamp','comentario','valoracion','id_cancion')));
        $sentencia->execute([$data->id_user,$data->timestamp,$data->comentario,$data->valoracion,$data->id_cancion,$data->id]);
    
    }
    public function allInCancion($idCancion)
    {
        
    }
    
}