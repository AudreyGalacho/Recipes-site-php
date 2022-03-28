<?php

/** Get all recipes from table were enabled is true
 * @param 
 * @return array|false
 */
// On récupère tout le contenu de la table recipes actives

$sqlQuery = 'SELECT * FROM recipes ORDER BY title';
    try {
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipesActiv = $recipesStatement->fetchAll();
        return $recipesActiv;
        
    } catch (Exception $e) {
        echo 'Exception : ', $e->getMessage();
    }

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


?>