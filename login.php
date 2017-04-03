<?php

    if(isset($_GET["login"]) && isset($_GET['password'])) 
    {
        $login = $_GET["login"];
        $password = $_GET['password'];
        $user = getUser($login, $password);

        if($user)
        {
            $_SESSION['user'] = $user;
            $_SESSION['login'] = true;
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

function getUser($login, $password) //sprawdza czy user jest w bazie
{
    return new User($login, $password); 
}