<?php

/** Get details on user logged
 * @param string 
 * @return array|false
 */
function getUserFormDatabase($user)
{ // Request author  ----------------------------------------------------------------------
    global $mysqlClient;

    $searchUser = 'SELECT * FROM users WHERE email = :email';
    try {
        $recipesStatement = $mysqlClient->prepare($searchUser);
        $recipesStatement->execute([
            'email' => $user,
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
