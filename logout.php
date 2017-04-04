<?php

if($currUser->isLoggedIn()) :
    $currUser->logOut();
    $currUser = new CurrentUser();
?>
Zostałeś wylogowany
<?php
else :
?>
Nie jesteś zalogowany
<?php
endif;

