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
        var_dump($sql);die;
        return $sql;
    }
    
    public function selectByID($tabla,$idName,$id) {
        $query = ($this->db->prepare('SELECT * FROM '. $tabla . ' WHERE '.$idName.' = ?'));
        $query->execute(array($id));
        $obj = $query->fetchAll(PDO::FETCH_OBJ);
        return $obj;
    }

    public function selectByColumn($tabla,$column,$parameter) {
        $query = $this->db->prepare('SELECT * FROM '. $tabla . ' WHERE ' . $column . ' = ?');
        $query->execute(array($parameter));
        $obj = $query->fetchAll(PDO::FETCH_OBJ); 
        return $obj;
    }
}
