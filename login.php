<?php

if(!$currUser->isLoggedIn())
{
    if(isset($_GET["login"]) && isset($_GET['password'])) 
    {
        $login = $_GET["login"];
        $password = $_GET['password'];
        $user = chechUserPassword($login, $password);

        if($user)
        {
            $_SESSION['login'] = true;
            $currUser = new CurrentUser();
            echo "zalogowano pomyślnie";
        }
        else 
        {
            echo "nie znaleziono";
        }

    } else 
    {
        echo "podaj login i hasło aby się zalogować";
    }
}
else {
?>

jesteś już zalogowany.
<a href="index.php?page=logout">Wyloguj się</a>

<?php
}


function chechUserPassword($login, $password) 
{
    // sprawdzic czy login i haslo pasuja
    
    return true; 
}