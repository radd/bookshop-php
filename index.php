<?php

require_once 'init.php';

$page  = isset($_GET['page']) ? $_GET['page'] : "home";
$login = isset($_SESSION['login']) ? $_SESSION['login'] : false;

if($page == 'login') {
    include 'login.php';
}

if($login)
{
    echo "<br /> jesteś zalogowany jako " . $_SESSION['user']->getName();
}
else 
{
    echo "nie jesteś zalogowany";
}

