<?php

if(!$currUser->isLoggedIn()) {
    if(isset($_GET["login"]) && isset($_GET['password'])) {
        $login = $_GET["login"];
        $password = md5($_GET['password']);
        $user = checkUserPassword($login, $password);

        if($user) {
            $_SESSION['login'] = true;
            $_SESSION['user_id'] = getUserID($login);
            $currUser = new CurrentUser();
            echo "zalogowano pomyślnie";
        }
        else {
            echo "nie znaleziono";
        }

    } else {
        echo "podaj login i hasło aby się zalogować";
    }
}
else {
?>

jesteś już zalogowany.
<a href="index.php?page=logout">Wyloguj się</a>
<br>
<?php
}

function checkUserPassword($login, $password) {
    $db = Database::getInstance();
    $user = $db->select_object("SELECT * FROM czytelnik WHERE login='" . $login . "' AND haslo='" . $password ."' ");
    if(isset($user[0]))
        return true;
    return false;
}