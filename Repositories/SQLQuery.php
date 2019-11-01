<?php

class SQLQuerys
{

    private $db;
    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=db_cancionero;charset=utf8', 'root', '');
    }

    function db()
    {
        return $this->db;
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
       
        $query = ($this->db->prepare('SELECT * FROM '.$tabla.' WHERE '.$idName.' = ?'));
        $query->execute(array($id));
        $obj = $query->fetch(PDO::FETCH_OBJ);
        return $obj;
    }

    function findByColumn($tabla,$column,$parameter)
    {
        $query = ($this->db->prepare('SELECT * FROM '. $tabla . ' WHERE '.$column.' = ?')); 
        $query->execute(array($parameter));
        $obj = $query->fetchAll(PDO::FETCH_OBJ); 
        return $obj;
    }
    function findFirstByColumn($tabla,$column,$parameter)
    {
        $query = ($this->db->prepare('SELECT * FROM '. $tabla . ' WHERE '.$column.' = ?')); 
        $query->execute(array($parameter));
        $obj = $query->fetch(PDO::FETCH_OBJ); 
        return $obj;
    }

    function maxNumber($tabla,$column)
    {
        
        $query = ($this->db->prepare("SELECT MAX(".$column.") FROM" .$tabla));
        $query->execute();
        $obj = $query->fetch(PDO::FETCH_OBJ); 
        return $obj[$column];
    }
    
}
