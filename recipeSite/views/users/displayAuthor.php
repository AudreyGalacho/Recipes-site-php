<?php
/** Display author in full name instead of mail adress
 * @param string 
 * @return string
 */

function displayAuthor(string $authorEmail): string //Affichage de l'auteur en nom complet
{
    $user=getUser($authorEmail);
        if ($authorEmail === $user['email']) {

            $authorRecipeFullName = $user['full_name'] . ' (' . $user['age'] . ' ans)';
            $recipeAuthor = '<i><a href="http://localhost/recipeSite/?destination=recettes?action=author?id='.$user['email'].'">' . $authorRecipeFullName . '</a></i>';
            return $recipeAuthor;
        }       
    }
?>