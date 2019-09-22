<?php

class SQLQuery
{

    private $db;
    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=db_cancionero;charset=utf8', 'geronimo', 'avyE9ob6CE7XDgft');
    }
    function all($tabla)
    {
        $query = ($this->db->prepare('SELECT * FROM '. $tabla)); 
        $query->execute();
        $obj = $query->fetchAll(PDO::FETCH_OBJ);
        return $obj;
    }

    function findByID($tabla,$idName,$id)
    {
        $query = ($this->db->prepare('SELECT * FROM '. $tabla . ' WHERE '.$idName.' = ' .$id));
        $query->execute();
        $obj = $query->fetchAll(PDO::FETCH_OBJ);
        return $obj;
    }

    function findByColumn($tabla,$column,$parameter)
    {
        $query = ($this->db->prepare('SELECT * FROM '. $tabla . ' WHERE '.$column." = '" .$parameter."'")); 
        $query->execute();
        $obj = $query->fetchAll(PDO::FETCH_OBJ); 
        return $obj;
    }

    
}
