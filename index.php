<?php

require_once 'init.php';

if(isset($_GET['page']) && $_GET['page']=='login') {
    include 'login.php';
}

if(isset($_SESSION['login']) && $_SESSION['login'])
{
    echo "<br /> jesteś zalogowany jako " . $_SESSION['user']->getName();
}
else 
{
    echo "nie jesteś zalogowany";
}

