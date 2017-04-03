<?php
    class User 
    {
        private $_login,
                $_password;
            
        public function __construct($login, $password)
        {
            $this->_login = $login;
            $this->_password = $password;
        }

        public function getName()
        {
            return $this->_login;
        }

    }