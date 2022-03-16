<?php

/** Display recipes detail and for recipes belong user logged buttons modif/errase
 * @param array|array
 * @return string
 */
function displayAllRescipes(array $recipes, $users)
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
