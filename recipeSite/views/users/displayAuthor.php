<?php
/** Display author in full name instead of mail adress
 * @param string|array 
 * @return string
 */

function displayAuthor(string $authorEmail, array $users): string //Affichage de l'auteur en nom complet
{
    for ($i = 0; $i < count($users); $i++) {
        $author = $users[$i];
        if ($authorEmail === $author['email']) {
            $authorRecipe = $author['full_name'] . ' (' . $author['age'] . ' ans)';
            $recipeAuthor = '<i><a href="/Site_recettes/recipes/recipeByAuthor.php?id=' . $author['email'] . '">' . $authorRecipe . '</a></i>';
            return $recipeAuthor;
        }
    }
}

?>