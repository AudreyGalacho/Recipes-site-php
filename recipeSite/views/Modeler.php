<?php
function displayAllRecipes()
{
    $recipesAll = recipeJoinUser();
    displayListRecipes($recipesAll);
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
