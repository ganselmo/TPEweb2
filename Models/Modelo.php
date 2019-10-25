<?php
require_once("Repositories/QuerySQL.php");
require_once("DB/Database.php");

abstract class Modelo
{
    protected $db;
    protected $query;
    protected $tabla;

    public abstract function create($values);
    
    public function get(){
        $query = $this->db->prepare($this->query->selectAll($this->tabla)); 
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    /* public abstract function update(); */
    public function delete($id) {
        $sentencia = $this->db->prepare($this->query->delete($this->tabla));
        $sentencia->execute(array($id));
    }
}
