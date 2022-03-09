<?php

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
    $recipe_content = '<h3 class= "card-title">' . $recipe['title'] . '</h3>';
    $recipe_content .= '<p class="card-text">' . $recipe['recipe'] . '</p>';
    return $recipe_content;
}

function displayAuthor(string $authorEmail, array $users): string //Affichage de l'auteur en nom complet
{
    for ($i = 0; $i < count($users); $i++) {
        $author = $users[$i];
        if ($authorEmail === $author['email']) {
            $authorRecipe = $author['full_name'] . ' (' . $author['age'] . ' ans)';
            $recipeAuthor = '<i>' . $authorRecipe . '</i>';
            return $recipeAuthor;
        }
    }
}

function dspAllRescipes(array $recipes, $users)
{
    foreach ($recipes as $recipe) {
        $dspRecipe = displayRecipe($recipe);
        $dspEndRecipeAuthor = displayAuthor($recipe['author'], $users);
    ?>
        <article class="cadre">
            <p class="card-text">
                <?php echo $dspRecipe . $dspEndRecipeAuthor;
                if ($recipe['author'] === $_SESSION['userMail']) {
                ?>
            <form>
                <a href="recipes/update.php?id=<?php echo $recipe['recipe_id']; ?>">
                    <input type="button" value="Modifier">
                </a>
                <a href="recipes/deleteRecipe.php?id=<?php echo $recipe['recipe_id']; ?>">
                    <input type="button" value="Effacer">
                </a>
            </form>
        <?php
                }
        ?>
        </p>
        </article>
<?php
    }
}
