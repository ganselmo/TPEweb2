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
        $sentencia = $this->db->prepare($this->query->insert($this->tabla, array('nombre','apellido','fechanac','ranking')));
        
        $sentencia->execute([$data->nombre,$data->apellido,$data->fechanac,$data->ranking]);
    }

    public function update($data) {
        $sentencia = $this->db->prepare($this->query->update($this->tabla, array('nombre','apellido','fechanac','ranking')));
        $sentencia->execute([$data->nombre,$data->apellido,$data->fechanac,$data->ranking,$data->id]);
    
    }

    
}