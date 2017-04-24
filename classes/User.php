<?php
class User {

    private $login,
            $ID,
            $email;

    public function setData($ID=0, $login='', $email='') {
        $this->login = $login;
        $this->ID = $ID;
        $this->email = $email;
    }

    public function getLogin() {
        return $this->login;
    }
    public function getID() {
        return $this->ID;
    }
    public function getEmail() {
        return $this->email;
    }


}