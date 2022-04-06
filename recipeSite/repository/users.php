<?php

/** Get all recipes from one author (all recipes where enabled true)
 * @param string
 * @return string|false
 */

function isUserLogged()
{
    $postData = $_POST;

    if (isset($postData['email'])) {
        $isUserKnown = getUser($postData['email']);
        if ($isUserKnown['email'] === $postData['email']) {
            $_SESSION['userLogged'] = $isUserKnown['full_name'];
            $_SESSION['userMail'] = $isUserKnown['email'];
        }else{
            ?>
            <p>
                Vous devez être enregistré pour accéder aux recettes !! 
            </p>
            <?php
        }
    }
    if (!isset($_SESSION['userLogged'])) {
        include_once('html/userLogIn.php');
        
    } else {
?>
        <p>
            Bonjour <?php echo $_SESSION['userLogged'] ?> bienvenu!!!
        </p>
<?php
    }
}


/** Get one recipe from is id
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