<?php
require_once("Models/Modelo.php");
require_once("Repositories/QuerySQL.php");
require_once("DB/Database.php");


class User extends Modelo
{
    protected $tabla;
    protected $db;
    protected $query;
    function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
        $this->query = new QuerySQL();
        $this->tabla = "usuarios";
    }
    public function register($userName,$pass)
    {
        $query = $this->db->prepare('INSERT INTO usuarios (user,id_role,password) values (?,?,?)');
        
        $query->execute(array($userName,2, password_hash($pass, PASSWORD_BCRYPT)));
    }

    


    public function getByUsername($userName)
    {
        $query = $this->db->prepare($this->query->findfirstByColumn($this->tabla, 'user')); 
        $query->execute(array($userName));
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    public function verifyUser($userName,$password) {        
        $user = $this->getByUsername($userName);
        if (!empty($user) && password_verify($password, $user->password)) {
            return true;
        } else {
            return false;
        }
    }

    public function all()
    {
        
    }

}
