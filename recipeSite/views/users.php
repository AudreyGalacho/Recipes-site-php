<?php

function logUserWindow()
{
// echo 'on est dans l\'affichage du log';
    isUserLogged(); //Check is a user is logged
    // var_dump(isUserLogged());
    if (isUserLogged() == false)  {
        echo'user not logged';
        $messageWelcome = include('views/html/windows/userLogIn.php');
        var_dump($messageWelcome);
        return $messageWelcome;
    } else {
    $messageWelcome = '<aside class="logMessage"><p> Bonjour ' . $_SESSION['userLogged'] . ' bienvenu !!!</p>';
    echo $messageWelcome;
    echo logOutButton() . '</aside>';
    return;
    }
} 

/** Get loggout
 * @param 
 * @return string|false
 */
function doUserLogOut()
{
    // echo ' LOGGIN OUT ';
    
    unset($_SESSION['userLogged']);
    unset($_SESSION['userMail']);
    unset($_COOKIE['key']);
    setcookie('key', '', time() - 3600, '/'); // empty value and old timestamp
    switcher(['recipes', 'list', 'all', '']);
    return;
}