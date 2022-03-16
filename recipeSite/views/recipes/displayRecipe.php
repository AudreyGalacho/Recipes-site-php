<?php
/** Update a recipe from is id 
 * @param array 
 * @return string
 */
function displayRecipe(array $recipe): string // Fonction d'affichage des recettes EN DEUX MORCEAU
{
    $recipe_content = '<h3 class= "card-title">' . $recipe['title'] . '</h3>';
    $recipe_content .= '<p class="card-text text-justify">' . $recipe['recipe'] . '</p>';
    return $recipe_content;
}



?>