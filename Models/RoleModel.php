<?php 
require_once("Models/Modelo.php");

class RoleModel extends Modelo
{
    public function __construct () {
        $this->db = Database::getInstance()->getConnection();
        $this->query = new QuerySQL();
        $this->tabla = "roles";
    }

    public function create($data) {
        $sentencia = $this->db->prepare($this->query->insert($this->tabla, array('id_user','timestamp','comentario','valoracion','id_cancion')));
        $sentencia->execute([$data->id_user,$data->timestamp,$data->comentario,$data->valoracion,$data->id_cancion]);
    }

    public function update($data) {
        $sentencia = $this->db->prepare($this->query->update($this->tabla, array('id_user','timestamp','comentario','valoracion','id_cancion')));
        $sentencia->execute([$data->id_user,$data->timestamp,$data->comentario,$data->valoracion,$data->id_cancion,$data->id]);
    
    }
    public function validateAccess($idRole,$type,$method,$url)
    {
        $query = $this->db->prepare("SELECT * FROM ACCESS WHERE ID_ROLE = ? AND TYPE = ? AND METHOD = ? AND URL = ?");
        $query->execute([$idRole,$type,$method,$url]);
        $result = $query->fetchAll(PDO::FETCH_OBJ);

        return $result;



    }
    
}