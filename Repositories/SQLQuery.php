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
        $query = ($this->db->prepare('SELECT * FROM '. $tabla)); //preparo consulta SQL
        $query->execute(); //ejecuto consulta SQL
        $obj = $query->fetchAll(PDO::FETCH_OBJ); //obtengo objeto
        return $obj;
    }

    function findByID($tabla,$idName,$id)
    {
        $query = ($this->db->prepare('SELECT * FROM '. $tabla . ' WHERE '.$idName.' = ' .$id)); //preparo consulta SQL
        $query->execute(); //ejecuto consulta SQL
        $obj = $query->fetchAll(PDO::FETCH_OBJ); //obtengo objeto
        return $obj;
    }

    function findByColumn($tabla,$column,$parameter)
    {
        $query = ($this->db->prepare('SELECT * FROM '. $tabla . ' WHERE '.$column." = '" .$parameter."'")); //preparo consulta SQL
        $query->execute(); //ejecuto consulta SQL
        $obj = $query->fetchAll(PDO::FETCH_OBJ); //obtengo objeto
        return $obj;
    }

    
}
