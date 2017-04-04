<?php
class User 
{
    private $_login,
            $_ID;
            
    public function __construct()
    {
    }

    public function setData($login='none', $ID=0)
    {
        $this->_login = $login;
        $this->_ID = $ID;
    }

    public function getName()
    {
        return $this->_login;
    }


}