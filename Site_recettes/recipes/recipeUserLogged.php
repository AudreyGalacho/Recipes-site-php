<?php
    include_once('../users/login.php');
    include_once('../blocs/bddCo.php');
    include_once('../blocs/functions.php');

//requete pour trouver les recettes de l'utilisateur loggé
$author = $_SESSION['userMail'];
var_dump($author);
?>
</br>
<?php

$sqlQuery = 'SELECT * FROM recipes WHERE author = :author ORDER BY title';
try {
    $recipesStatement = $mysqlClient->prepare($sqlQuery);
    $recipesStatement->execute([
        'author' => $author,
    ]);
    echo 'execution OK';
    $recipesByAuthor = $recipesStatement->fetchAll();
} catch (Exception $e) {
    echo 'Exception : ', $e->getMessage();
}
?>
</br>
<?php
foreach($recipesByAuthor as $recipe){
echo displayRecipe($recipe); // Fonction d'affichage des recettes
?>
<form>
    <a href="recipes/update.php?id=<?php echo $recipe['recipe_id']; ?>">
        <input type="button" value="Modifier">
    </a>
    <a href="recipes/deleteRecipe.php?id=<?php echo $recipe['recipe_id']; ?>">
        <input type="button" value="Effacer">
    </a>
</form>
<?php
}
 include_once('../blocs/footer.php');
?>
