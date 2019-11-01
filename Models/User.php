<?php
class User 
{
    protected $tabla = "usuarios";
    protected $query = "";
    function __construct()
    {
        
    }
    public function register($userName,$pass)
    {


        $query = $this->query->db()->prepare('INSERT INTO usuarios (user,password) values (?,?)');
        $query->execute(array($userName, password_hash($pass, PASSWORD_BCRYPT)));
    }

    public function login($userName,$pass)
    {
        $session = new Session();
        
        $session->login($this->getByUsername($userName));
    }
    private function getByUsername($userName)
    {
        return $this->query->findFirstByColumn($this->tabla, "user", $userName);
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
