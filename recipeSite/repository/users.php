<?php

/** Get all recipes from one author (all recipes where enabled true)
 * @param string|array
 * @return string|false
 */

function isUserLogged($postData, $usersAll)
{
    $postData = $_POST;

    if (isset($postData['email'])) {
        $i = 0;
        while (!isset($_SESSION['userLogged']) && $i < count($usersAll)) {

            if (($usersAll[$i]['email'] === $postData['email']) &&
                ($usersAll[$i]['password'] === $postData['password'])
            ) {

                $_SESSION['userLogged'] = $usersAll[$i]['full_name'];
                $_SESSION['userMail'] = $usersAll[$i]['email'];
                $_SESSION['errMessage'] = '';
                $_SESSION['pageNav'] = 0;
            }
            ++$i;
        }
    }
    if (!isset($_SESSION['userLogged'])) {
        include_once('../html/userLogIn.php');
    } else {
?>
        <p>
            Bonjour <?php echo $_SESSION['userLogged'] ?> bienvenu!!!
        </p>
        <!-- Ajout d'un renvoi index? -->
        <?php echo $_SESSION['pageNav'];
        include_once('../views/router.php');
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