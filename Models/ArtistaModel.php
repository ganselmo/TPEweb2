<?php 
require_once("Models/Model.php");

class ArtistaModel
{
    public function __construct () {
        $this->db = Database::getInstance();
        $this->query = new QuerySQL();
        $this->tabla = 'artista';
    }

    public function get() {
        $query = $this->db->prepare(selectAll($this->tabla)); 
        $query->execute();
        $obj = $query->fetchAll(PDO::FETCH_OBJ);
        var_dump($obj);die;
        return $obj;
    }
}