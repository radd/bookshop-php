<?php
class CurrentUser {

    private $user,
            $isLoggedIn;

    public function __construct() {
        $session = isset($_SESSION['login']) ? $_SESSION['login'] : false;
        $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
        if($session) {
            $this->isLoggedIn = true;
            $this->setUserData($user_id);
        }
        else {
             $this->isLoggedIn = false;
             $this->user = null;
        }
    }

    public function setUserData($ID = 0) {
        if($ID != 0) {
            $db = Database::getInstance();
            $user = $db->select_object("SELECT * FROM czytelnik WHERE id_czytelnik='" . $ID . "' ");
            if(isset($user[0])) {
                $this->user = new User();
                $this->user->setData($user[0]->id_czytelnik, $user[0]->login, $user[0]->email);
            }
        }
    }

    public function getUser() {
        return $this->user;
    }

    public function isLoggedIn() {
        return $this->isLoggedIn;
    }

     public function logOut() {
        $_SESSION['login'] = false;
    }


}