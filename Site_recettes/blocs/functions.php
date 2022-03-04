<?php

function display_recipe(array $recipe): string // Fonction d'affichage des recettes
{

    $recipe_content = '';
    $recipe_content = '<article>';
    $recipe_content .= '<h3>' . $recipe['title'] . '</h3>';
    $recipe_content .= '<div>' . $recipe['recipe'] . '</div>';
    $recipe_content .= '<i>' . $recipe['author'] . '</i>';
    $recipe_content .= '</article>';

    return $recipe_content;
}

function display_author(string $authorEmail, array $usersAll): string //ESSAYER DE METTRE CETTE FONCTION DANS CELLE DU DESSUS
{
    for ($i = 0; $i < count($usersAll); $i++) {
        $author = $usersAll[$i];
        if ($authorEmail === $author['email']) {
            return $author['full_name'] . '(' . $author['age'] . ' ans)';
        }
    }
}

function get_recipes(array $recipes, int $limit): array //NON UTILISE
{
    $valid_recipes = [];
    $counter = 0;

    foreach ($recipes as $recipe) {
        if ($counter == $limit) {
            return $valid_recipes;
        }

        if ($recipe['is_enabled']) {
            $valid_recipes[] = $recipe;
            $counter++;
        }
    }
    return $valid_recipes;
}

function backButton($page) //Le bouton pour retourner à la page acceuil qui pourra servir de bouton juste retour un jour
{
?>
    <form>
        <a href="/Site_recettes/<?php $page; ?>">
            <input type="button" value="Retour" name="Retour">
        </a>
    </form>
<?php
}

function displayRecipe(array $recipe): string // Fonction d'affichage des recettes EN DEUX MORCEAU
{

    $recipe_content = '';
    $recipe_content .= '<h3>' . $recipe['title'] . '</h3>';
    $recipe_content .= '<div>' . $recipe['recipe'] . '</div>';
    return $recipe_content;
}

function displayAuthor(string $authorEmail, array $users): string //fait suite a celle d'avant

{
    for ($i = 0; $i < count($users); $i++) {
        $author = $users[$i];
        if ($authorEmail === $author['email']) {
            $authorCool = $author['full_name'] . ' (' . $author['age'] . ' ans)';
            $recipeEnd = '<i>' . $authorCool . '</i>';
            return $recipeEnd;
        }
    }
}


