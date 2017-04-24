<?php

require_once 'init.php'; //dodanie pliku; jeżeli wcześniej plik nie został dodany to go dodaje

$db = Database::getInstance(); //instancja bazy danych

if($db->connect()) { //sprawdzenie połączenia z bazą danych
    $currUser = new CurrentUser();

    //przekierowanie do danej strony
    $page  = isset($_GET['page']) ? $_GET['page'] : "home";

    if($page == 'login') {
        include 'login.php';
    } 
    else if ($page == 'logout') {
        include 'logout.php';
    }
    else if ($page == 'create_table') {
        include 'create_table.php';
    }

    if($currUser->isLoggedIn()) {
        echo "<br /> jesteś zalogowany jako " . $currUser->getUser()->getLogin();
    }
    else {
        echo "nie jesteś zalogowany";
    }

    $db->close();

}
else {
    echo "Błąd połączenia się z bazą danych: " . $db->error;
}
