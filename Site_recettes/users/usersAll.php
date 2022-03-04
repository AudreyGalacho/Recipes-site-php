
<?php
// On récupère tout le contenu de la table recipes
$sqlQuery = 'SELECT * FROM users';
try {
    $usersStatement = $mysqlClient->prepare($sqlQuery);
    $usersStatement->execute();
    $usersAll = $usersStatement->fetchAll();
} catch (Exception $e) {    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : ' . $e->getMessage());
}


?>