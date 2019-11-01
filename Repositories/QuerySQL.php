<?php
class QuerySQL
{
    public function __construct() {

    }

    public function selectAll($tabla) {
        return 'SELECT * FROM '. $tabla;
    }
    
    public function delete($tabla) {
        return 'DELETE FROM ' . $tabla . ' WHERE id=?';
    }

    public function insert($tabla, $columns) {
        $sql = "INSERT INTO ";
        $sql .= $tabla . "(";
        for($i = 0; $i < count($columns); $i++) {
            $sql .= $columns[$i];
            if($i < count($columns) - 1) {
                $sql .= ",";
            }
        }
        $sql .= ") VALUES (";
        for($i = 0; $i < count($columns); $i++) {
            $sql .= "?";
            if($i < count($columns) - 1) {
                $sql .= ",";
            }
        }
        $sql .=")";
        return $sql;
    }

    public function update($tabla, $columns) {
        $sql = "UPDATE ";
        $sql .= $tabla . " SET ";
        for($i = 0; $i < count($columns); $i++) {
            $sql .= $columns[$i] . " = ?";
            if($i < count($columns) - 1) {
                $sql .= ", ";
            }
        }
        $sql .= " WHERE id=?";
        return $sql;
    }
    
    public function selectByID($tabla) {
        $sql = 'SELECT * FROM '. $tabla . ' WHERE id = ?';
        return $sql;
    }
<<<<<<< HEAD
    function findFirstByColumn($tabla,$column,$parameter)
    {
        $query = ($this->db->prepare('SELECT * FROM '. $tabla . ' WHERE '.$column.' = ?')); 
        $query->execute(array($parameter));
        $obj = $query->fetch(PDO::FETCH_OBJ); 
        return $obj;
    }
=======
<<<<<<< HEAD

    public function selectBoth($tabla1, $tabla2, $id1, $id2, $filtro) {
        $sql = 'SELECT * FROM '. $tabla1 . ', ' . $tabla2 . ' WHERE ? = ? AND ' . $filtro . '= ?';
        return $sql;
    }
=======
    
>>>>>>> 94c0b168e315c56374975573717b292c765564b0
>>>>>>> 1802a79d24e27c47e6133a1c746e8cb4931d9203
}
