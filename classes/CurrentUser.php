<?php
class CurrentUser
{
    private $_user,
            $_isLoggedIn;

            
    public function __construct()
    {
        $session = isset($_SESSION['login']) ? $_SESSION['login'] : false;
        if($session)
        {
            $this->_isLoggedIn = true;
            $this->setUserData();
        }
        else
        {
             $this->_isLoggedIn = false;
             $this->_user = null;
        }
    }

    public function setUserData($login = 'none', $ID = 0)
    {
        //z bazy danych
        $this->_user = new User();
        $this->_user->setData($login, $ID);
    }

    public function getUser()
    {
        return $this->_user;
    }

    public function isLoggedIn()
    {
        return $this->_isLoggedIn;
    }

     public function logOut()
    {
        $_SESSION['login'] = false;
    }


}