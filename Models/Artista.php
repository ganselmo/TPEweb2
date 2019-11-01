<?php 
require_once("Models/Model.php");
class Artista extends Model
{
    protected $tabla = 'artistas';
    
    public function insert($values) {

        $sql = $this->sqlQuery->db()->prepare("INSERT INTO ".$this->tabla."  values (?,?,?,?,?)");
        $sql->execute(array($this->nextNumber(),$values['nombre'],$values['apellido'],$values['fechanac'],$values['ranking']));
    
    }

    public function update($values) {
        $sql = $this->sqlQuery->db()->prepare("UPDATE ".$this->tabla." SET nombre = ?,apellido = ?, fechanac = ?, ranking = ? WHERE id = ?" );
        $sql->execute(array($values['nombre'],$values['apellido'],$values['fechanac'],$values['ranking'],$values['id']));
    }

    public function delete($id) {
        
        $sql = $this->sqlQuery->db()->prepare("DELETE FROM ".$this->tabla." WHERE id = ?"); 
        
        $sql->execute(array($id));
    }
}