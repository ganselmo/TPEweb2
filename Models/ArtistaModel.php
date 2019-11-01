<?php 
require_once("Models/Modelo.php");

class ArtistaModel extends Modelo
{
    public function __construct () {
        $this->db = Database::getInstance()->getConnection();
        $this->query = new QuerySQL();
        $this->tabla = "artistas";
    }

    public function create($values) {
        $sentencia = $this->db->prepare($this->query->insert($this->tabla, array('nombre','apellido','fechanac','ranking')));

        $sentencia->execute(array($values['nombre'],$values['apellido'],$values['fechanac'],$values['ranking']));
    }

    public function update($values) {
        $sentencia = $this->db->prepare($this->query->update($this->tabla, array('nombre','apellido','fechanac','ranking')));
<<<<<<< HEAD
        $sentencia->execute(array($values['nombre'],$values['apellido'],$values['fechanac'],$values['ranking'],$values['id']));
    
=======
        $sentencia->execute(array($values));
>>>>>>> 02a0d808af1c75648f052651103cff3262ab0c80
    }

    
}