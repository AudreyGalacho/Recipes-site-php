<?php
$author = 'lupi@exemple.com';
// On récupère tout le contenu de la table recipes actives
$sqlQuery = 'SELECT * FROM recipes WHERE author = :author ORDER BY title';
try {
    $recipesStatement = $mysqlClient->prepare($sqlQuery);
    $recipesStatement->execute([
        'author' => $author
    ]);
    $recipesByAuthor = $recipesStatement->fetchAll();
} catch (Exception $e) {
    echo 'Exception : ', $e->getMessage();
}
?>