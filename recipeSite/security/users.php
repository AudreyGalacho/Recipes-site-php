<?php

function logUserWindow()
{   
    // echo ' </br>AFF SESSION VAR ';
    // var_dump($_SESSION);
    include_once('views/html/users/display.php');

    if (!isset($_POST['email']) && (!isset($_SESSION['userMail'])))
    {
        include('views/html/users/userLogIn.php');
        return;
    }
    if (isset($_POST['email']))
    {
        $isUserKnown = getUserFormDatabase($_POST['email']);
        // var_dump($isUserKnown);
        if ($isUserKnown == false) 
        {// No user Match on database
            messageLogErr();
            return false;
        }
        else
        {// User Known
            doUserLogIn($isUserKnown['full_name'], $isUserKnown['email']);
            $messageWelcome = '<aside class="logMessage"><p> Bonjour ' . $_SESSION['userLogged'] . ' bienvenu !!!</p>';
            echo $messageWelcome. logOutButton() . '</aside>';
        return;
        }
    }
    if (isset($_SESSION['userMail']))
    {
        $messageWelcome = '<aside class="logMessage"><p> Bonjour ' . $_SESSION['userLogged'] . ' bienvenu !!!</p>';
        echo $messageWelcome. logOutButton() . '</aside>';
        return;
    }
        // var_dump($_SESSION);
}


/** Do log in global variable
 * @param string
 * @return 
 */
function doUserLogIn($userName, $userMail)
{
    $_SESSION['userLogged'] = $userName;
    $_SESSION['userMail'] = $userMail;
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