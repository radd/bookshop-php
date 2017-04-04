<?php

require_once 'init.php';

$currUser = new CurrentUser();

$page  = isset($_GET['page']) ? $_GET['page'] : "home";

if($page == 'login') {
    include 'login.php';
} 
else if ($page == 'logout')
{
    include 'logout.php';
}

if($currUser->isLoggedIn())
{
    echo "<br /> jesteś zalogowany jako " . $currUser->getUser()->getName();
}
else 
{
    echo "nie jesteś zalogowany";
}

