<?php

class SQLQuery
{

    private $db;
    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=db_cancionero;charset=utf8', 'root', '');
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

    function save($table,$data)
    {
        $query = $this->db->prepare('INSERT INTO ? VALUES ?'); 
        $query;
        $query->execute();

    }
    
}
