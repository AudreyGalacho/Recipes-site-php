<?php
/** Get one recipe from is id
 * @param string 
 * @return array|false
 */
function getRecipeById($idRecipe)
{ // Request recipe By ID  ----------------------------------------------------------------------
    global $mysqlClient;
    $searchRecipe = 'SELECT recipes.recipe_id, recipes.title, recipes.abstract, recipes.author, users.full_name, users.age 
                        FROM recipes INNER JOIN users ON users.email = recipes.author 
                        WHERE recipe_id = :id';
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

/** Delete recipe from ID 
 * @param string 
 * @return string|false
 */
function removeRecipesById($id)
{
    global $mysqlClient;
    $deleteRecipe = 'DELETE FROM recipes WHERE recipe_id = :id';
    try {
        $suppRecipe = $mysqlClient->prepare($deleteRecipe);
        $suppRecipe->execute([
            'id' => $id,
        ]);
        // echo 'RECIPE DELETED ';
    } catch (Exception $e) {
        echo 'Exception : ', $e->getMessage();
    }
}

/** Update a recipe from his id 
 * @param string $title $detail $id
 * @return string|false
 */
function updateRecipesById($title, $abstract, $id)
{ // Request By ID avec verif ----------------------------------------------------------------------
    global $mysqlClient;

    $sqlQuery = 'UPDATE recipes SET title = :title, abstract = :abstract WHERE recipe_id = :id';
    try {
        $insertRecipe = $mysqlClient->prepare($sqlQuery);
        $insertRecipe->execute([
            'title' => $title,
            'abstract' => $abstract,
            'id' => $id,
        ]);
        $messageOkUpdate = 'Update OK ';
        return $messageOkUpdate;
    } catch (Exception $e) {
        echo 'Exception : ', $e->getMessage();
        return false;
    }
}

/** Add recipe to data base
 * @param string
 * @return array|false
 */
function addRecipe($title, $abstract, $author)
{
    global $mysqlClient;
    $sqlQuery = 'INSERT INTO `recipes`(`title`, `abstract`, `author`,`is_enabled`) VALUES (:title, :abstract, :author, :is_enabled)';
    try {
        $insertRecipe = $mysqlClient->prepare($sqlQuery);
        $insertRecipe->execute([
            'title' => $title,
            'abstract' => $abstract,
            'author' => $author,
            'is_enabled' => 1,
        ]);
    } catch (Exception $e) {
        echo 'Exception : ', $e->getMessage();
        return false;
    }
}

/** Get recipe by Title
 * @param string
 * @return array|false
 */
function getRecipeByTitle($title)
{
    global $mysqlClient;
    $sqlQuery = 'SELECT recipes.recipe_id, recipes.title, recipes.abstract, recipes.author, users.full_name, users.age 
                    FROM recipes INNER JOIN users ON users.email = recipes.author 
                    WHERE title = :title';
    try {
        $recipeStatement = $mysqlClient->prepare($sqlQuery);
        $recipeStatement->execute([
            'title' => $title,
        ]);
        $recipeTitle = $recipeStatement->fetch();
        return $recipeTitle;
    } catch (Exception $e) {
        echo 'Exception : ', $e->getMessage();
        return false;
    }
}
/** Get recipe by Abstract 
 * @param string
 * @return array|false
 */
function getRecipeByAbstract($abstract)
{
    global $mysqlClient;
    $sqlQuery = 'SELECT * FROM recipes WHERE abstract = :abstract';
    try {
        $recipeStatement = $mysqlClient->prepare($sqlQuery);
        $recipeStatement->execute([
            'abstract' => $abstract,
        ]);
        $recipeAbstract = $recipeStatement->fetch();
        return $recipeAbstract;
    } catch (Exception $e) {
        echo 'Exception : ', $e->getMessage();
        return false;
    }
}
/** Get the next recipe in the table 
 * @param string
 * @return array|false
 */
function getNextRecipe($idRecipe)
{
    $recipeById=getRecipeById($idRecipe);
    $titleRecipe =$recipeById['title'];

    global $mysqlClient;    
    $sqlQuery = 'SELECT * FROM recipes WHERE title = (SELECT MIN(title) FROM recipes WHERE title > :titleRef)';
    try {
        $recipeStatement = $mysqlClient->prepare($sqlQuery);
        $recipeStatement->execute([
        'titleRef' => $titleRecipe,
    ]);
    $recipeNext = $recipeStatement->fetch();
    return $recipeNext;
    } catch (Exception $e) {
    echo 'Exception : ', $e->getMessage();
    return false;
    }
}

/** Get the previews recipe in the table 
 * @param string
 * @return array|false
 */
function getPreviewRecipe($idRecipe)
{
    $recipeById=getRecipeById($idRecipe);
    $titleRecipe =$recipeById['title'];

    global $mysqlClient;    
    $sqlQuery = 'SELECT * FROM recipes WHERE title = (SELECT MAX(title) FROM recipes WHERE title < :titleRef)';
    try {
        $recipeStatement = $mysqlClient->prepare($sqlQuery);
        $recipeStatement->execute([
        'titleRef' => $titleRecipe,
    ]);
    $recipePreview = $recipeStatement->fetch();
    return $recipePreview;
    } catch (Exception $e) {
    echo 'Exception : ', $e->getMessage();
    return false;
    }
}

/** Join table recipe and user and order by title
 * @param
 * @return array|false
 */
function recipeJoinUser(){
    global $mysqlClient ;
    $sqlQuery = 'SELECT recipes.recipe_id, recipes.title, recipes.abstract, recipes.author, users.full_name, users.age 
                    FROM recipes INNER JOIN users ON users.email = recipes.author 
                        ORDER BY title';
    try {
        $recipeStatement = $mysqlClient->prepare($sqlQuery);
        $recipeStatement->execute();
    $recipesJoin = $recipeStatement->fetchAll();
    return $recipesJoin;
    } catch (Exception $e) {
    echo 'Exception : ', $e->getMessage();
    return false;
    }
}

/** Get all recipes from one author (order by title) with join
 * @param string 
 * @return array|false
 */

function recipeByAuthorJoinUser($author){
    global $mysqlClient ;
    $sqlQuery = 'SELECT recipes.recipe_id, recipes.title, recipes.abstract, recipes.author, users.full_name, users.age 
                    FROM recipes LEFT OUTER JOIN users ON users.email = recipes.author 
                        WHERE recipes.author = :author
                        ORDER BY title';
    try {
        $recipeStatement = $mysqlClient->prepare($sqlQuery);
        $recipeStatement->execute([
            'author' => $author,
        ]);
    $recipesJoin = $recipeStatement->fetchAll();
    return $recipesJoin;
    } catch (Exception $e) {
    echo 'Exception : ', $e->getMessage();
    return false;
    }
}