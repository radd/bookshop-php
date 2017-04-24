<?php

function getUserID($login) {
    $db = Database::getInstance();
    $user = $db->select_object("SELECT id_czytelnik FROM czytelnik WHERE login='" . $login . "' ");
    if(isset($user[0]))
        return $user[0]->id_czytelnik; 
    return 0;
}
