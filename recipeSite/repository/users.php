<?php

/** Get loggin
 * @param 
 * @return string|false
 */

function isUserLogged()
{
    if (!isset($_POST['email'])) {
        include_once('html/users/userLogIn.php');
        return;
    } else {
        $isUserKnown = getUser($_POST['email']);

        if ($isUserKnown == false) {
            echo '<p class="debug-display"> Utilisateur inconnu </p>';
            include_once('html/users/userLogIn.php');
            return;
        }
        if ($isUserKnown['email'] === $_POST['email']) {
            $_SESSION['userLogged'] = $isUserKnown['full_name'];
            $_SESSION['userMail'] = $isUserKnown['email'];
            switcher(['recipes', 'list', 'all', '']);
            return;
        } 
    }
}

/** Get loggout
 * @param 
 * @return string|false
 */
function userLogOut()
{
    // echo ' LOGGIN OUT ';
    unset($_COOKIE['key']);
    setcookie('key', '', time() - 3600, '/'); // empty value and old timestamp
    session_destroy();
    unset($_SESSION['userLogged']);
    unset($_SESSION['userMail']);
    router();
    return;
}

/** Get details on user logged
 * @param string 
 * @return array|false
 */
function getUser($userLogged)
{ // Request author  ----------------------------------------------------------------------
    global $mysqlClient;

    $searchUser = 'SELECT * FROM users WHERE email = :email';
    try {
        $recipesStatement = $mysqlClient->prepare($searchUser);
        $recipesStatement->execute([
            'email' => $userLogged,
        ]);
        $searchUser = $recipesStatement->fetch();
        return $searchUser;
    } catch (Exception $e) {
        echo 'Exception : ', $e->getMessage();
        return false;
    }
}


/** Get all users from table
 * @param array 
 * @return array|false
 */
function getAllUsers()
{
    global $mysqlClient;
    $sqlQuery = 'SELECT * FROM users';
    try {
        $usersStatement = $mysqlClient->prepare($sqlQuery);
        $usersStatement->execute();
        $usersAll = $usersStatement->fetchAll();
        return $usersAll;
    } catch (Exception $e) {
        echo 'Exception : ', $e->getMessage();
        return false;
    }
}
