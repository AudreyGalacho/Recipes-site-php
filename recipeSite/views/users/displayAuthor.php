<?php
/** Display author in full name instead of mail adress
 * @param string|array
 * @return string
 */

function displayAuthor($recipeAuthor, $recipe) //Affichage de l'auteur en nom complet
{
    $user=getUser($recipeAuthor);
        if ($recipeAuthor === $user['email']) {

            // var_dump($recipe);

            $authorRecipeFullName = $recipe['full_name'] . ' (' . $recipe['age'] . ' ans)';
            $recipeAuthor = '<i><a class="text-decoration-none text-reset text-end" href="http://localhost/recipeSite/?recipes/list/author/'.$recipe['email'].'">' . $authorRecipeFullName . '</a></i>';
            return $recipeAuthor;
        }       
    }
?>