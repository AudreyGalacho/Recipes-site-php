<?php
/** Display author in full name instead of mail adress
 * @param array
 * @return string
 */

function displayAuthor($recipe) //Affichage de l'auteur en nom complet
{        
    $authorRecipeFullName = $recipe['full_name'] . ' (' . $recipe['age'] . ' ans)';
    $recipeAuthor = '<i><a class="text-decoration-none text-reset text-end" href="/recipeSite/?recipes/list/author/'.$recipe['author'].'">' . $authorRecipeFullName . '</a></i>';
    return $recipeAuthor;
}
?>