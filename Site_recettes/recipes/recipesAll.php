<?php
// On récupère tout le contenu de la table recipes actives
$sqlQuery = 'SELECT * FROM recipes WHERE is_enabled = 1 ORDER BY title';
try {
    $recipesStatement = $mysqlClient->prepare($sqlQuery);
    $recipesStatement->execute();
    $recipesActiv = $recipesStatement->fetchAll();
} catch (Exception $e) {
    echo 'Exception : ', $e->getMessage();
}
?>

