<?php
require_once("Models/Modelo.php");
require_once("Models/User.php");
class ComentarioModel extends Modelo
{
    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
        $this->query = new QuerySQL();
        $this->tabla = "comentarios";
    }

    public function create($data)
    {
        $timestamp = $this->getTimeStamp();
        $sentencia = $this->db->prepare($this->query->insert($this->tabla, array('id_user', 'timestamp', 'comentario', 'valoracion', 'id_cancion')));
        $sentencia->execute([$data->user, $timestamp, $data->comentario, $data->valoracion, $data->id_cancion]);
    }

    public function allInCancion($idCancion)
    {
        $query = $this->db->prepare("SELECT USUARIOS.user, COMENTARIOS.* FROM COMENTARIOS INNER JOIN USUARIOS ON COMENTARIOS.ID_USER = USUARIOS.ID WHERE ID_CANCION = ?");
        $query->execute([$idCancion]);
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    public function getTimeStamp()
    {
        return date_format(new DateTime(),'Y-m-d h:m:s');
    }

   
}
