<?php
function displayAllRecipes()
{
    // echo 'display all recipes';
    // $usersAll = getAllUsers();
    $recipesAll = recipeJoinUser();
    displayListRecipes($recipesAll);
}

function displayFormLog()
{
    // echo 'form LOG';
    $usersAll = getAllUsers();
    isUserLogged($_POST, $usersAll);
}

function routerDefault()
{
    $usersAll = getAllUsers();
    isUserLogged($_POST, $usersAll);
}
/** Get the recipe join from recipe id of database table 
 * @param string|array
 * @return array|false
 */
function getRecipeJoin($idGet, $recipesJoin)
{
    // var_dump($idGet ,$recipesJoin);
    foreach ($recipesJoin as $recipe) {
        if ($recipe['recipe_id'] === $idGet) {
            return $recipe;
        }
    }
}
