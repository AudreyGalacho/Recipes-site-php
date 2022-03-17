<?php

/** Get one recipe from is id
 * @param string 
 * @return array|false
 */
function getRecipeById($idRecipe)
{ // Request recipe By ID  ----------------------------------------------------------------------
    global $mysqlClient;

    $searchRecipe = 'SELECT * FROM recipes WHERE recipe_id = :id';
    try {
        $recipesStatement = $mysqlClient->prepare($searchRecipe);
        $recipesStatement->execute([
            'id' => $idRecipe,
        ]);
        $recipeByiD = $recipesStatement->fetch();
        return $recipeByiD;
    } catch (Exception $e) {
        echo 'Exception : ', $e->getMessage();
        return false;
    }
}

/** Get all recipes from one author (all recipes where enabled true)
 * @param string 
 * @return array|false
 */

function getRecipesByAuthor($author)
{ // Request By ID avec verif ----------------------------------------------------------------------
    global $mysqlClient;

    $sqlQuery = 'SELECT * FROM recipes WHERE author = :author AND is_enabled = :is_enabled ORDER BY title';
    try {
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute([
            'author' => $author,
            'is_enabled' => 1,
        ]);
        $recipesByAuthor = $recipesStatement->fetchAll();
        return $recipesByAuthor;
    } catch (Exception $e) {
        echo 'Exception : ', $e->getMessage();
        return false;
    }
}


/** Update a recipe from his id 
 * @param string $title $detail $id
 * @return string|false
 */
function updateRecipesById($title , $detail , $id)
{ // Request By ID avec verif ----------------------------------------------------------------------
    global $mysqlClient;

$sqlQuery = 'UPDATE recipes SET title = :title, recipe = :recipe WHERE recipe_id = :id';
try {
    $insertRecipe = $mysqlClient->prepare($sqlQuery);
    $insertRecipe->execute([
        'title' => $title,
        'recipe' => $detail,
        'id' => $id,
    ]);
    $messageOkUpdate = 'Update OK ';
    return $messageOkUpdate;
} catch (Exception $e) {
    echo 'Exception : ', $e->getMessage();
    return false;

}
}