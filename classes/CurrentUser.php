<?php
class CurrentUser {

    private $user,
            $isLoggedIn;

    public function __construct() {
        $session = isset($_SESSION['login']) ? $_SESSION['login'] : false;
        $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
        if($session) { // true = użytkoniwk zalogowany
            $this->isLoggedIn = true;
            $this->setUserData($user_id);
        }
        else {
             $this->isLoggedIn = false;
             $this->user = null;
        }
    }

    public function setUserData($ID = 0) { //utworzenie obiektu klasy User
        if($ID != 0) {
            $cols = array('id_czytelnik' => $ID);
            $user = selectUser($cols);
            if(isset($user[0]))
                $this->user = $user[0];
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