<?php

/** Get loggin
 * @param 
 * @return string|false
 */

function isUserLogged()
{
    $postData = $_POST;
    
    if (!isset($postData['email'])) {
        include_once('html/users/userLogIn.php');
    } else {
        $isUserKnown = getUser($postData['email']);
        if ($isUserKnown['email'] === $postData['email']) {
            $_SESSION['userLogged'] = $isUserKnown['full_name'];
            $_SESSION['userMail'] = $isUserKnown['email'];
        }
    }
    if (isset($_SESSION['userLogged'])) {
        switcher(['recipes','list','all','']);  
    }
}

/** Get loggout
 * @param 
 * @return string|false
 */
function userLogOut(){
    unset($_SESSION['userLogged']);
    unset($_SESSION['userMail']);
    switcher(['recipes','list','all','']);
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

?>