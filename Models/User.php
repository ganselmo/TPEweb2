<?php
require_once("Repositories/QuerySQL.php");
require_once("DB/Database.php");


class User 
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
        $query = $this->db->prepare('INSERT INTO usuarios (user,password) values (?,?)');
        $query->execute(array($userName, password_hash($pass, PASSWORD_BCRYPT)));
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
        // encontró un user con el username que mandó, y tiene la misma contraseña
        if (!empty($user) && password_verify($password, $user->password)) {
            return true;
        } else {
            return false;
        }
    }
    public function logOut()
    {
        $session = new Session();
        $session->logOut();
    }
}
