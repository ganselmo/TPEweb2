<?php
require_once("Repositories/QuerySQL.php");
require_once("DB/Database.php");

Class Modelo
{
    protected $db;
    protected $query;
    protected $tabla;


    
    public function get(){
        $query = $this->db->prepare($this->query->selectAll($this->tabla)); 
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function getByID($id) {
        $query = $this->db->prepare($this->query->selectByID($this->tabla)); 
        $query->execute(array($id));
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    


    public function delete($id) {
        $sentencia = $this->db->prepare($this->query->delete($this->tabla));
        $sentencia->execute([$id->id]);
    }
}
