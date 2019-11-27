<?php

class Session
{
    public function __construct()
    { }

    public function login($user)
    {
        $this->checkSession();
        $_SESSION['ID_USER'] = $user->id;
        $_SESSION['USER'] = $user->user;
        $_SESSION['ROLE'] = $user->id_role;
    }

    public function logOut()
    {
        $this->checkSession();
        session_unset();
        session_destroy();
    }

    public function isLoggedIn()
    {

        $this->checkSession();
        if (isset( $_SESSION['USER'])) {
            return true;
        } else {
            return false;
        }
    }
    public function session()
    {
        echo session_id();
    }
    public function getLoggedUserName()
    {
        $this->checkSession();
        return $_SESSION['USER'];
    }

    public function checkSession()
    {
        if (!isset($_SESSION)) {
            session_start();
        }

    }
    public function getRole()
    {
        $this->checkSession();
        return $_SESSION['ROLE'];
    }
}
